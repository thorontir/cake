<div class="threads form">
<?php echo $this->Form->create('Thread');?>
	<fieldset>
		<legend><?php echo __('Add Thread'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('date_modified');
		echo $this->Form->input('original_poster_id');
		echo $this->Form->input('last_poster_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Forum'), array('controller' => 'threads', 'action' => 'index')); ?></li>
	</ul>
</div>
