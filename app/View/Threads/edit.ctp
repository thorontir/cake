<div class="threads form">
<?php echo $this->Form->create('Thread');?>
	<fieldset>
		<legend><?php echo __('Edit Thread'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Thread.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Thread.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
