<div class="rankings index">
	<h2><?php echo __('Rankings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tournament_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('match_points');?></th>
			<th><?php echo $this->Paginator->sort('elo');?></th>
			<th><?php echo $this->Paginator->sort('bye');?></th>
			<th><?php echo $this->Paginator->sort('wins');?></th>
			<th><?php echo $this->Paginator->sort('draws');?></th>
			<th><?php echo $this->Paginator->sort('defeats');?></th>
			<th><?php echo $this->Paginator->sort('away');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($rankings as $ranking): ?>
	<tr>
		<td><?php echo h($ranking['Ranking']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ranking['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $ranking['Tournament']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ranking['User']['name'], array('controller' => 'users', 'action' => 'view', $ranking['User']['id'])); ?>
		</td>
		<td><?php echo h($ranking['Ranking']['match_points']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['elo']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['bye']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['wins']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['draws']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['defeats']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['away']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ranking['Ranking']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ranking['Ranking']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ranking['Ranking']['id']), null, __('Are you sure you want to delete # %s?', $ranking['Ranking']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
