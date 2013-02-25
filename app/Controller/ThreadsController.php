<?php
App::uses('AppController', 'Controller');
/**
 * Threads Controller
 *
 * @property Thread $Thread
 */
class ThreadsController extends AppController {


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

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $threadId = $this->request->params['pass'][0];
            if ($this->Thread->isOwnedBy($threadId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);

    }

	public function index() {
		$this->Thread->recursive = 0;
		$this->set('threads', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Thread->id = $id;
		if (!$this->Thread->exists()) {
			throw new NotFoundException(__('Invalid thread'));
		}
		$this->set('thread', $this->Thread->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Thread->create();
			if ($this->Thread->save($this->request->data)) {
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
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
		$this->Thread->id = $id;
		if (!$this->Thread->exists()) {
			throw new NotFoundException(__('Invalid thread'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Thread->save($this->request->data)) {
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Thread->read(null, $id);
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
		$this->Thread->id = $id;
		if (!$this->Thread->exists()) {
			throw new NotFoundException(__('Invalid thread'));
		}
		if ($this->Thread->delete()) {
			$this->Session->setFlash(__('Thread deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Thread was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
