<div class="signups form">
<?php echo $this->Form->create('Signup');?>
	<fieldset>
		<legend><?php echo __('Edit Signup'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tournament_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Signup.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Signup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Signups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
