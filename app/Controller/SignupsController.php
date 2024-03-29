<?php
App::uses('AppController', 'Controller', 'UsersTournamentsController');
/**
 * Signups Controller
 *
 * @property Signup $Signup
 */
class SignupsController extends AppController {


/**
 * index method
 *
 * @return void
 */
    public function isAuthorized($user) {
        // All registered users can add posts
        if (in_array($this->action, array('index', 'view', 'add'))) {
            return true;
        }

        // The user himself can delete his signup
        if (in_array($this->action, array('delete'))) {
            $signupId = $this->request->params['pass'][0];
            if ($this->Signup->isOwnedBy($signupId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);

    }

	public function index($id = null) {
		$this->Signup->recursive = 0;
		$this->set('signups', $this->paginate(array('tournament_id'=>$id)));
        $this->Signup->Tournament->id = $id;
        $this->set('name', $this->Signup->Tournament->field('name'));
        $this->set('id', $id);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Signup->id = $id;
		if (!$this->Signup->exists()) {
			throw new NotFoundException(__('Invalid signup'));
		}
		$this->set('signup', $this->Signup->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
        // check wether user is already signed up !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if ($this->request->is('post')) {
            if ($this->Signup->find('all', array('conditions' => array('tournament_id' => $id, 'user_id' => $this->Session->read('Auth.User.id'))))) {
                $this->Session->setFlash(__('You are already signed up.'));
                $this->redirect(array('action' => 'index', $id));
            } else {
			$this->Signup->create();
            $this->request->data['Signup']['tournament_id']=$id;
            $this->request->data['Signup']['user_id']=$this->Session->read('Auth.User.id');
            if ($this->Signup->save($this->request->data)) {
                $this->Session->setFlash(__('The signup has been saved'));
                $this->redirect(array('action' => 'index', $id));
            } else {
                $this->Session->setFlash(__('The signup could not be saved. Please, try again.'));
            }
        }
        }
        $this->set('id', $id);
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Signup->id = $id;
        $tournament = $this->Signup->field('tournament_id');
        if (!$this->Signup->exists()) {
            throw new NotFoundException(__('Invalid signup'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Signup->save($this->request->data)) {
                $this->Session->setFlash(__('The signup has been saved'));
                $this->redirect(array('action' => 'index', $tournament));
            } else {
                $this->Session->setFlash(__('The signup could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Signup->read(null, $id);
        }
        $tournaments = $this->Signup->Tournament->find('list');
        $users = $this->Signup->User->find('list');
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
        $this->Signup->id = $id;
        $tournament = $this->Signup->field('tournament_id');
        if (!$this->Signup->exists()) {
            throw new NotFoundException(__('Invalid signup'));
        }
        if ($this->Signup->delete()) {
            $this->Session->setFlash(__('Signup deleted'));
            $this->redirect(array('action' => 'index', $tournament));
        }
        $this->Session->setFlash(__('Signup was not deleted'));
        $this->redirect(array('action' => 'index', $tournament));
    }
}
