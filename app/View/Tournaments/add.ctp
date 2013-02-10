<div class="tournaments form">
<?php echo $this->Form->create('Tournament');?>
	<fieldset>
		<legend><?php echo __('Add Tournament'); ?></legend>
	<?php
		echo $this->Form->input('name');
        echo $this->Form->input('typeAlias', array('label'=>'Type','options' => array("Random KO","Seeded KO","Swiss")));
		//echo $this->Form->input('typeField');
		//echo $this->Form->input('typeAlias');
		//echo $this->Form->input('current_round');
		//echo $this->Form->input('ranked');
		//echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tournaments'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rounds'), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Round'), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Signups'), array('controller' => 'signups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Signup'), array('controller' => 'signups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
