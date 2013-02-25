<?php
App::uses('AppController', 'Controller');
/**
 * Tournaments Controller
 *
 * @property Tournament $Tournament
 */
class TournamentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
    public function isAuthorized($user) {
        // All registered users can add posts
        if (in_array($this->action, array('index', 'view'))) {
            return true;
        }


        return parent::isAuthorized($user);

    }

	public function index() {
		$this->Tournament->recursive = 0;
		$this->set('tournaments', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tournament->id = $id;
		if (!$this->Tournament->exists()) {
			throw new NotFoundException(__('Invalid tournament'));
		}
		$this->set('tournament', $this->Tournament->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                $this->Tournament->create();
                $this->request->data['Tournament']['current_round']=-1;
                switch ($this->request->data['Tournament']['typeAlias']){
                case 0:
                    $this->request->data['Tournament']['typeField']='KO';
                    break;
                case 1:
                    $this->request->data['Tournament']['typeField']='SKO';
                    break;
                case 2:
                    $this->request->data['Tournament']['typeField']='Swiss';
                }
                if ($this->Tournament->save($this->request->data)) {
                    $this->Session->setFlash(__('The tournament has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The tournament could not be saved. Please, try again.'));
                }
            }
        }
        $users = $this->Tournament->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Tournament->id = $id;
        if (!$this->Tournament->exists()) {
            throw new NotFoundException(__('Invalid tournament'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data)) {
                $this->request->data['Tournament']['current_round']=-1;
                switch ($this->request->data['Tournament']['typeAlias']){
                case 0:
                    $this->request->data['Tournament']['typeField']='KO';
                    break;
                case 1:
                    $this->request->data['Tournament']['typeField']='SKO';
                    break;
                case 2:
                    $this->request->data['Tournament']['typeField']='Swiss';
                }
                if ($this->Tournament->save($this->request->data)) {
                    $this->Session->setFlash(__('The tournament has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The tournament could not be saved. Please, try again.'));
                }
            }
        } else {
            $this->request->data = $this->Tournament->read(null, $id);
        }
        $users = $this->Tournament->User->find('list');
        $this->set(compact('users'));
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
        $this->Tournament->id = $id;
        if (!$this->Tournament->exists()) {
            throw new NotFoundException(__('Invalid tournament'));
        }
        if ($this->Tournament->delete()) {
            $this->Session->setFlash(__('Tournament deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Tournament was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
