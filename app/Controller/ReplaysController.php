<?php
App::uses('AppController', 'Controller');
/**
 * Replays Controller
 *
 * @property Replay $Replay
 */
class ReplaysController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Replay->recursive = 0;
		$this->set('replays', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Replay->id = $id;
		if (!$this->Replay->exists()) {
			throw new NotFoundException(__('Invalid replay'));
		}
		$this->set('replay', $this->Replay->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Replay->create();
			if ($this->Replay->save($this->request->data)) {
				$this->Session->setFlash(__('The replay has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The replay could not be saved. Please, try again.'));
			}
		}
		$matches = $this->Replay->Match->find('list');
		$this->set(compact('matches'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Replay->id = $id;
		if (!$this->Replay->exists()) {
			throw new NotFoundException(__('Invalid replay'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Replay->save($this->request->data)) {
				$this->Session->setFlash(__('The replay has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The replay could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Replay->read(null, $id);
		}
		$matches = $this->Replay->Match->find('list');
		$this->set(compact('matches'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Replay->id = $id;
		if (!$this->Replay->exists()) {
			throw new NotFoundException(__('Invalid replay'));
		}
		if ($this->Replay->delete()) {
			$this->Session->setFlash(__('Replay deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Replay was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
