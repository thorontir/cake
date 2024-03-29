<?php
App::uses('AppController', 'Controller');
/**
 * Rankings Controller
 *
 * @property Ranking $Ranking
 */
class RankingsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ranking->recursive = 0;
		$this->set('rankings', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ranking->id = $id;
		if (!$this->Ranking->exists()) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		$this->set('ranking', $this->Ranking->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ranking->create();
			if ($this->Ranking->save($this->request->data)) {
				$this->Session->setFlash(__('The ranking has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
			}
		}
		$tournaments = $this->Ranking->Tournament->find('list');
		$users = $this->Ranking->User->find('list');
		$this->set(compact('tournaments', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Ranking->id = $id;
		if (!$this->Ranking->exists()) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ranking->save($this->request->data)) {
				$this->Session->setFlash(__('The ranking has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ranking->read(null, $id);
		}
		$tournaments = $this->Ranking->Tournament->find('list');
		$users = $this->Ranking->User->find('list');
		$this->set(compact('tournaments', 'users'));
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
		$this->Ranking->id = $id;
		if (!$this->Ranking->exists()) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		if ($this->Ranking->delete()) {
			$this->Session->setFlash(__('Ranking deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ranking was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
