<div class="users index">
	<h2><?php echo __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('lastlogin');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo 'Battle.net Account' //echo $this->Paginator->sort('bnetaccount');?></th>
			<th><?php echo 'Battle.net Code' //$this->Paginator->sort('bnetcode');?></th>
			<th><?php echo $this->Paginator->sort('race');?></th>
			<th><?php echo $this->Paginator->sort('elo');?></th>
			<th><?php echo $this->Paginator->sort('division');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['lastlogin']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['bnetaccount']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['bnetcode']); ?>&nbsp;</td>
		<td><?php echo $this->Race->small_img($user['User']['race']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['elo']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['division']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php if ($this->Session->read('Auth.User.id') === $user['User']['id'] || $this->Session->read('Auth.User.admin')) {echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']));} ?>
			<?php if ($this->Session->read('Auth.User.id') === $user['User']['id'] || $this->Session->read('Auth.User.admin')) {echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete %s?', $user['User']['username']));} ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
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
