<div class="signups index">
	<h2><?php echo __("Signups for $name");?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php foreach ($signups as $signup): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($signup['User']['name'], array('controller' => 'users', 'action' => 'view', $signup['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php if ($this->Session->read('Auth.User.id') === $signup['Signup']['user_id'] || $this->Session->read('Auth.User.admin')) {echo $this->Form->postLink(__('Unsign'), array('action' => 'delete', $signup['Signup']['id']), null, __('Are you sure you want to delete # %s?', $signup['Signup']['id']));} ?>
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
    <div class="actions">
        <ul> 
            <li><?php echo $this->Html->link(__('Sign me up'), array('action' => 'add', $id)); ?></li>
        </ul>
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
