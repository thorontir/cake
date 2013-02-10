<div class="signups view">
<h2><?php  echo __('Signup');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($signup['Signup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tournament'); ?></dt>
		<dd>
			<?php echo $this->Html->link($signup['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $signup['Tournament']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($signup['User']['name'], array('controller' => 'users', 'action' => 'view', $signup['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Signup'), array('action' => 'edit', $signup['Signup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Signup'), array('action' => 'delete', $signup['Signup']['id']), null, __('Are you sure you want to delete # %s?', $signup['Signup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Signups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Signup'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
