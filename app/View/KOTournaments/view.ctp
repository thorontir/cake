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

