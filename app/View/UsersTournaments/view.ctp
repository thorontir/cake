<div class="usersTournaments view">
<h2><?php  echo __('Users Tournament');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersTournament['UsersTournament']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersTournament['User']['name'], array('controller' => 'users', 'action' => 'view', $usersTournament['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tournament'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersTournament['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $usersTournament['Tournament']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Tournament'), array('action' => 'edit', $usersTournament['UsersTournament']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Tournament'), array('action' => 'delete', $usersTournament['UsersTournament']['id']), null, __('Are you sure you want to delete # %s?', $usersTournament['UsersTournament']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Tournaments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Tournament'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
	</ul>
</div>
