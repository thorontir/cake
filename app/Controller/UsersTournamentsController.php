<?php
App::uses('AppController', 'Controller');
/**
 * UsersTournaments Controller
 *
 * @property UsersTournament $UsersTournament
 */
class UsersTournamentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UsersTournament->recursive = 0;
		$this->set('usersTournaments', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UsersTournament->id = $id;
		if (!$this->UsersTournament->exists()) {
			throw new NotFoundException(__('Invalid users tournament'));
		}
		$this->set('usersTournament', $this->UsersTournament->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersTournament->create();
			if ($this->UsersTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The users tournament has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users tournament could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UsersTournament->id = $id;
		if (!$this->UsersTournament->exists()) {
			throw new NotFoundException(__('Invalid users tournament'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UsersTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The users tournament has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users tournament could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UsersTournament->read(null, $id);
		}
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
		$this->UsersTournament->id = $id;
		if (!$this->UsersTournament->exists()) {
			throw new NotFoundException(__('Invalid users tournament'));
		}
		if ($this->UsersTournament->delete()) {
			$this->Session->setFlash(__('Users tournament deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Users tournament was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
