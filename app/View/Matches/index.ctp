<div class="matches index">
	<h2><?php echo __('Matches');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('round_id');?></th>
			<th><?php echo $this->Paginator->sort('player1_id');?></th>
			<th><?php echo $this->Paginator->sort('player2_id');?></th>
			<th><?php echo $this->Paginator->sort('games');?></th>
			<th><?php echo $this->Paginator->sort('player1_score');?></th>
			<th><?php echo $this->Paginator->sort('player2_score');?></th>
			<th><?php echo $this->Paginator->sort('open');?></th>
			<th><?php echo $this->Paginator->sort('number_in_round');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($matches as $match): ?>
	<tr>
		<td><?php echo h($match['Match']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($match['Round']['id'], array('controller' => 'rounds', 'action' => 'view', $match['Round']['id'])); ?>
		</td>
		<td><?php echo h($match['Match']['player1_id']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['player2_id']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['games']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['player1_score']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['player2_score']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['open']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['number_in_round']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $match['Match']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $match['Match']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $match['Match']['id']), null, __('Are you sure you want to delete # %s?', $match['Match']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Match'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Rounds'), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Round'), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
