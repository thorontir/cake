<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('username');
        echo $this->Form->input('password', array('type' => 'password'));
		echo $this->Form->input('bnetaccount', array('label' => 'Battle.net Account'));
		echo $this->Form->input('bnetcode', array('label' => 'Battle.net Character Code'));
        echo $this->Form->input('race', array('options' => array("Terran","Protoss","Zerg","Random",)));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
</div>
