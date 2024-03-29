<?php
App::import('Controller', 'Tournaments');
class MatchesController extends AppController {

	var $name = 'Matches';
	var $helpers = array('Race','Text','Bbcode');
	
    public function isAuthorized($user) {
        // All registered users can add posts
        if (in_array($this->action, array('index', 'view'))) {
            return true;
        }

        return parent::isAuthorized($user);

    }

	function generate ($round_id, $number_in_round, $games_per_match)
	{
		$this->Match->create();
		$this->request->data['Match']['round_id']=$round_id;
		$this->request->data['Match']['number_in_round']=$number_in_round;
		$this->request->data['Match']['games']=$games_per_match;
		$this->request->data['Match']['open']=1;
		if ($this->Match->save($this->request->data)) {
				
		} 
		else 
		{
				$this->Session->setFlash(__('The match could not be saved. Please, try again.', true));
		}
		
	}
	function generate_with_matchup ($round_id, $number_in_round, $games_per_match, $player1_id, $player2_id)
	{
		$this->Match->create();
		$this->request->data['Match']['round_id']=$round_id;
		$this->request->data['Match']['number_in_round']=$number_in_round;
		$this->request->data['Match']['games']=$games_per_match;
		$this->request->data['Match']['player1_id']=$player1_id;
		$this->request->data['Match']['player2_id']=$player2_id;
		
		if(!$player1_id){
			$this->request->data['Match']['player2_score']=1;
			$this->request->data['Match']['open']=0;
		}
		
		else if (!$player2_id){
			$this->request->data['Match']['player1_score']=1;
			$this->request->data['Match']['open']=0;
		}
		else
		{
			$this->request->data['Match']['open']=1;
		}
		if ($this->Match->save($this->request->data)) {
		} 
		else 
		{
				$this->Session->setFlash(__('The match could not be saved. Please, try again.', true));
		}
		
	}
	
	function index() {
		$this->Match->recursive = 0;
		$this->set('matches', $this->paginate());
	}

	function view($id = null) {
		// Get User's id for authentication
        $user_id = $this->Auth->user('id');
		$this->set('current_user',$user_id);
		if ($this->Match->field('player1_id') == $user_id OR $this->Match->field('player2_id') == $user_id  OR $this->Session->read('Auth.User.admin'))
		{
			$this->set('report',true);
		}
		else
		{
			$this->set('report',false);
		}
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid match', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->request->data)) {

			if ((!$this->Session->read('Auth.User.admin')) AND ($this->Match->field('player1_id') != !$this->Session->read('Auth.User.id')) AND ($this->Match->field('player2_id') != !$this->Session->read('Auth.User.id')))
			{
				$this->Session->setFlash(__('Access denied', true));
				//$this->redirect(array('action'=>'index'));
			}

			$this->request->data['Match']['open']=0;
			if ($this->Match->save($this->request->data)) {
				$this->Session->setFlash(__('The match has been saved', true));
				
				$Tournaments = new TournamentsController;
				$Tournaments->ConstructClasses();
			
				$Tournaments->report_match($this->Match->id, $this->request->data['Match']['player1_score'],$this->request->data['Match']['player2_score']);
				}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Match->read(null, $id);
		}
		$match=$this->Match->read(null, $id);
		$this->set('match', $match );
		$round=$this->Match->Round->findById($match['Match']['round_id']);
		$this->set('round', $round);
		$comments=$this->Match->Comment->find('all',array('conditions'=>array('Comment.match_id'=>$id),'order'=>array('Comment.date_posted DESC')));
		$this->set('comments' , $comments);
		$replays=$this->Match->Replay->find('all',array('conditions'=>array('Replay.match_id'=>$id)));
		$this->set('replays' , $replays);
	}



	function edit($id = null) {
		if (!$this->Session->read('Auth.User.admin'))
		{
			$this->Session->setFlash(__('Access denied', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid match', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Match->save($this->request->data)) {
				$this->Session->setFlash(__('The match has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Match->read(null, $id);
		}
		$rounds = $this->Match->Round->find('list');
		$player1s = $this->Match->Player1->find('list');
		$player2s = $this->Match->Player2->find('list');
		$this->set(compact('rounds', 'player1s', 'player2s'));
	}

	function delete($id = null) {
	if (!$this->Session->read('Auth.User.admin'))
		{
			$this->Session->setFlash(__('Access denied', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for match', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Match->delete($id)) {
			$this->Session->setFlash(__('Match deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Match was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function post_comment($id)
		{
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for match', true));
			$this->redirect(array('action'=>'index'));
		}
		if(!empty($this->request->data))
		{
			$this->Match->Comment->create();
			$user_id = $this->Auth->user('id');
			$this->request->data['Comment']['user_id']=$user_id;
			$this->request->data['Comment']['match_id']=$id;
			$date = date_create('now');

			$this->request->data['Comment']['date_posted']=$date->format('Y-m-d H:i:s');
			$this->Match->Comment->save($this->request->data);
			$this->redirect(array('action' => 'view',$id));
		}
	}
	function upload_replays($id){
		if ((!$this->Session->read('Auth.User.admin')) AND ($this->Match->field('player1_id') != !$this->Session->read('Auth.User.id')) AND ($this->Match->field('player2_id') != !$this->Session->read('Auth.User.id')))
		{
			$this->Session->setFlash(__('Access denied', true));
			//$this->redirect(array('action'=>'index'));
		}
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for match', true));
			$this->redirect(array('action'=>'index'));
		}
		if(!empty($this->request->data))
		{
			$this->request->data['Replay']['match_id']=$id;
			foreach ($this->request->data['Replay'] as $i=>$replay)
			{
				if(!empty($this->request->data['Replay'][$i]['file']))
				{
					$this->Match->Replay->create();
					
					$this->request->data['Replay']['file']=$this->request->data['Replay'][$i]['file'];
					$this->Match->Replay->save($this->request->data);
				}
			}
			$this->redirect(array('action' => 'view',$id));
			
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Match->read(null, $id);
		}
		$this->set('match',$this->Match->read(null,$id));
	}
}
?>
