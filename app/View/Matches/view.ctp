<div class="matches view">



<h2><?php echo ($this->Race->small_img($match['Player1']['race']).' '. $match['Player1']['username'] .' VS '.$match['Player2']['username'].' '.$this->Race->small_img($match['Player2']['race']));?></h2>
<br>
    <dl><?php $i = 0; $class = 'class="altrow"';?>
		<dt <?php if ($i % 2 == 0) echo $class;?>><?php echo __('Round'); ?></dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($match['Round']['number']+1); ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>><?php echo __('Tournament'); ?></dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($round['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $round['Tournament']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt <?php if ($i % 2 == 0) echo $class;?>><?php echo __('Best of'); ?></dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $match['Match']['games']; ?>
			&nbsp;
		</dd>
	
	</dl>
	<?php 

	//Show Report page, if user participates and match is open
	if($report AND $match['Match']['open'])
	//if($match['Match']['open'])
	{
	?>
	
	<div class="scores">
		<?php echo $this->Form->create('Match');?>
		<h3>Scores</h3>
		<div class="score1">
			<?php echo ($this->Race->small_img($match['Player1']['race']).' '. $match['Player1']['username'])?>
			<?php echo $this->Form->input('player1_score', array( 'label' => '' ));?>
		</div>
		<div class="score2">
			<?php echo $this->Form->input('player2_score', array( 'label' => '' ));?>
			<?php echo ($match['Player2']['username'].' '.$this->Race->small_img($match['Player2']['race']))?>
		</div>
		<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	<?php
	}
	//show normal page otherwise
	else
	{
	?>
	<div class="scores">
		<h3>Scores</h3>
		<div align="left">
			<?php echo ($this->Race->small_img($match['Player1']['race']).' '. $match['Player1']['username'].' <strong>'.$match['Match']['player1_score'].'</strong>')?>
		</div>
		<div align="right">
			<?php echo ('<strong>'.$match['Match']['player2_score'].'</strong> '. $match['Player2']['username'].' '.$this->Race->small_img($match['Player2']['race']))?>
		</div>
	</div>
	<?php
	}?>
	<h3>Replays</h3>
	<?php
	//show upload button if allowed
	if($report){?>
	<ul class="actions">
		<li><?php echo $this->Html->link('Upload Replays', array('controller'=>'matches', 'action' => 'upload_replays', $match['Match']['id']));?></li>
    </ul>
    <br>
	<?php }?>
	<?php foreach ($replays as $replay)
	{?>
		<?php echo $this->Html->link( $replay['Replay']['name'], '/files/'.$replay['Replay']['name'] );?>
		<br>
	<?php }?>
	<h3>Comments</h3>
	<?php echo $this->Form->create('Match', array('action'=>'post_comment'));?>
	<?php echo $this->Form->input('Comment.body', array('label'=>'Post Comment'));?>
	BBCode is enabled<br>
	Embedding images is disabled
	<?php echo $this->Form->end(__('Submit', true));?>
	<table>
		<?php
		foreach ($comments as $comment){?>
		<tr>
			<td class="info">
				<?php echo($this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view', $comment['User']['id']))); ?>
				<br>
				<small>
				<?php echo ($comment['Comment']['date_posted']);?>
				</small>
			</td>
			<td>
				<div align="right" class="buttons">
					<?php
					if ($this->Session->read('Auth.User.admin') OR $comment['Comment']['user_id']==$current_user)
					{
						echo($this->Html->link('Edit', array('controller' => 'comments', 'action' => 'edit', $comment['Comment']['id'])));
						echo $this->Html->link('Delete', array('controller' => 'comments', 'action' => 'delete', $comment['Comment']['id']), null, sprintf(__('Are you sure you want to delete this Comment?', true)));
					}?>
				</div>
				<?php $body = $this->Bbcode->doShortcode(strip_tags($comment['Comment']['body']));
				echo ( $this->Text->autoLink($body));?>
			</td>
		</tr>
		<?php }?>
	</table>
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
