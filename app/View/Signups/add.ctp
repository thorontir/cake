<div class="signups form">
<?php echo $this->Form->create('Signup');?>
	<fieldset>
		<legend><?php echo __('Sure?'); ?></legend>
        <?php echo $this->Html->link(__('No, get me out of here!'), array('action' => 'index', $id)); ?>
	</fieldset>
<?php echo $this->Form->end(__('Yes')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Signups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
