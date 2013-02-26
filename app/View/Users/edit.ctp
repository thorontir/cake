<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
        echo $this->Form->input('password_validate', array('type' => 'password', 'label' => 'Password validate'));
		echo $this->Form->input('bnetaccount');
		echo $this->Form->input('bnetcode');
        echo $this->Form->input('race', array('options' => array("Terran","Protoss","Zerg","Random",)));
        if ($this->Session->read('Auth.User.admin')) 
        {
            echo $this->Form->input('admin');
		    echo $this->Form->input('elo');
		    echo $this->Form->input('division');
		    echo $this->Form->input('Tournament');
        }
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
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
