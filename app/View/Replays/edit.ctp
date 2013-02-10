<div class="replays form">
<?php echo $this->Form->create('Replay');?>
	<fieldset>
		<legend><?php echo __('Edit Replay'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('size');
		echo $this->Form->input('match_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Replay.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Replay.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Replays'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
