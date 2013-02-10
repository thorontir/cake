<div class="rankings form">
<?php echo $this->Form->create('Ranking');?>
	<fieldset>
		<legend><?php echo __('Add Ranking'); ?></legend>
	<?php
		echo $this->Form->input('tournament_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('match_points');
		echo $this->Form->input('elo');
		echo $this->Form->input('bye');
		echo $this->Form->input('wins');
		echo $this->Form->input('draws');
		echo $this->Form->input('defeats');
		echo $this->Form->input('away');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
