<div class="tournaments bracket view">



<h2><?php  echo ($tournament['KOTournament']['name']);?></h2>
<?php $m = 0;?>
<?php foreach ($tournament['Round'] as $round){?>


	<div class="tournamentRound">
	<?php 
	$this->Bracket->spaceboxes($round['number']);
	foreach ($round['Match'] as $match){
        // ACHTUNG BESSEREN WEG SUCHEN UM DEN RICHTIGEN INDEX FUER DEN USER ZU FINDE
		$this->Bracket->matchbox($users[$match['player1_id']],$users[$match['player2_id']],$match['player1_score'],$match['player2_score'],$match['id']);
		$this->Bracket->dummyboxes($round['number']);
	}?>
	</div>
<?php 
	$m += 30;
}?>
<!--
<table>
<?php foreach ($tournament['Round'] as $round){?>
	<tr>
	<?php foreach ($round['Match'] as $match){?>
	
		<td>
			<?php 
			if ($match['player1_id']!=null)
			{
				echo $this->Race->small_img($match['player1_id']['race']);
				echo ('<strong>'.$match['player1_score'].'</strong> ');
			}?>
			<?php 
			//Link to match
			$matchtitle = '';
			if ($match['player1_id']!=null)
				$matchtitle .=($match['player1_id']['username']) ;
			$matchtitle .= ' vs ' ;
			if ($match['player2_id']!=null)
				$matchtitle .=($match['player2_id']['username']);
			echo $this->Html->link(($matchtitle), array('controller' => 'matches', 'action' => 'view',$match['id'])); 	
				?>
			<?php 
			if ($match['player2_id']!=null)
			{
				echo (' <strong>'.$match['player2_score'].'</strong>');
				echo $this->Race->small_img($match['player2_id']['race']);
			}?>
		</td>

	<?php
	} ?>
	</tr>
<?php
} ?>
-->	
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?></li>
		<li><?php if ($this->Session->read('Auth.User.admin')) {echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add'));} ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Forum'), array('controller' => 'threads', 'action' => 'index')); ?></li>
	</ul>
</div>
