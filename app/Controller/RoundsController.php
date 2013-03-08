<?php
App::uses('AppController', 'Controller');
/**
 * Rounds Controller
 *
 * @property Round $Round
 */
class RoundsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Round->recursive = 0;
		$this->set('rounds', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Round->id = $id;
		if (!$this->Round->exists()) {
			throw new NotFoundException(__('Invalid round'));
		}
		$this->set('round', $this->Round->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Round->create();
			if ($this->Round->save($this->request->data)) {
				$this->Session->setFlash(__('The round has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The round could not be saved. Please, try again.'));
			}
		}
		$tournaments = $this->Round->Tournament->find('list');
		$this->set(compact('tournaments'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Round->id = $id;
		if (!$this->Round->exists()) {
			throw new NotFoundException(__('Invalid round'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Round->save($this->request->data)) {
				$this->Session->setFlash(__('The round has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The round could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Round->read(null, $id);
		}
		$tournaments = $this->Round->Tournament->find('list');
		$this->set(compact('tournaments'));
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
		$this->Round->id = $id;
		if (!$this->Round->exists()) {
			throw new NotFoundException(__('Invalid round'));
		}
		if ($this->Round->delete()) {
			$this->Session->setFlash(__('Round deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Round was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
