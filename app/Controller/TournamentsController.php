<?php
App::uses('AppController', 'Controller');
/**
 * Tournaments Controller
 *
 * @property Tournament $Tournament
 */
class TournamentsController extends AppController {

	function start($id)
	{
		$this->Tournament->id=$id;
		if ($this->Tournament->field('typeField') == 'KO' )
		{
			$this->redirect(array('controller'=> 'KOTournaments','action' => 'start_random',$id));
		}
		if($this->Tournament->field('typeField') == 'SKO')
		{
			$this->redirect(array('controller'=> 'KOTournaments','action' => 'start_seeded',$id));
		}
		if ($this->Tournament->field('typeField') == 'Swiss')
		{
			$this->redirect(array('controller'=> 'SwissTournaments','action' => 'start',$id));
		}
		
	}

	function report_match($match_id, $player1_score, $player2_score)
	{
		
		//get corresponding tournament
		$match = $this->Tournament->Round->Match->findById($match_id);
		$round = $this->Tournament->Round->findById($match['Round']['id']);
		$tournament_id = $round['Tournament']['id'];
		$tournament = $this->Tournament->findById($tournament_id);
		if($tournament['Tournament']['ranked'])
		{
			$this->update_elo($match['Match']['player1_id'],$match['Match']['player2_id'],$player1_score, $player2_score);
		}
		//pass on to the right controller
		if($tournament['Tournament']['typeAlias']==0)
		{
			$KOTournaments = new KOTournamentsController;
			$KOTournaments->ConstructClasses();
			
			$KOTournaments->report_match($match_id,$player1_score,$player2_score);
		}
	}
	
	function update_elo($player1_id, $player2_id, $player1_score, $player2_score)
	{
		//Get old elo
		$player1 = $this->Tournament->User->findById($player1_id);
		$player2 = $this->Tournament->User->findById($player2_id);
		
		$player1_elo = $player1['User']['elo'];
		$player2_elo = $player2['User']['elo'];
		
		//Set winning coefficient
		if ($player1_score > $player2_score)
		{	
			$r1 = 1;
			$r2 = 0;
		}
		if ($player1_score < $player2_score)
		{	
			$r1 = 0;
			$r2 = 1;
		}
		if ($player1_score == $player2_score)
		{	
			$r1 = 0.5;
			$r2 = 0.5;
		}
		
		//Calculate new elo
		$k = 15;
		$player1_expect = 1/(1+pow(10,($player2_elo-$player1_elo)/400));
		$player2_expect = 1/(1+pow(10,($player1_elo-$player2_elo)/400));
		
		$player1_new_elo = $player1_elo + $k*($r1-$player1_expect);
		$player2_new_elo = $player2_elo + $k*($r2-$player2_expect);
		
		$this->Tournament->User->id = $player1_id;
		$this->Tournament->User->saveField('elo',$player1_new_elo);
		
		$this->Tournament->User->id = $player2_id;
		$this->Tournament->User->saveField('elo',$player2_new_elo);
	}

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
