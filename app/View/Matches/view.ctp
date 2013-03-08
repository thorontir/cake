<div class="matches view">
<h2><?php  echo __('Match');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($match['Match']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Round'); ?></dt>
		<dd>
			<?php echo $this->Html->link($match['Round']['id'], array('controller' => 'rounds', 'action' => 'view', $match['Round']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player1 Id'); ?></dt>
		<dd>
			<?php echo h($match['Match']['player1_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player2 Id'); ?></dt>
		<dd>
			<?php echo h($match['Match']['player2_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Games'); ?></dt>
		<dd>
			<?php echo h($match['Match']['games']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player1 Score'); ?></dt>
		<dd>
			<?php echo h($match['Match']['player1_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player2 Score'); ?></dt>
		<dd>
			<?php echo h($match['Match']['player2_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open'); ?></dt>
		<dd>
			<?php echo h($match['Match']['open']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number In Round'); ?></dt>
		<dd>
			<?php echo h($match['Match']['number_in_round']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Match'), array('action' => 'edit', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Match'), array('action' => 'delete', $match['Match']['id']), null, __('Are you sure you want to delete # %s?', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rounds'), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Round'), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comments');?></h3>
	<?php if (!empty($match['Comment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Date Posted'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($match['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id'];?></td>
			<td><?php echo $comment['match_id'];?></td>
			<td><?php echo $comment['user_id'];?></td>
			<td><?php echo $comment['body'];?></td>
			<td><?php echo $comment['date_posted'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Replays');?></h3>
	<?php if (!empty($match['Replay'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Size'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($match['Replay'] as $replay): ?>
		<tr>
			<td><?php echo $replay['id'];?></td>
			<td><?php echo $replay['name'];?></td>
			<td><?php echo $replay['type'];?></td>
			<td><?php echo $replay['size'];?></td>
			<td><?php echo $replay['match_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'replays', 'action' => 'view', $replay['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'replays', 'action' => 'edit', $replay['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'replays', 'action' => 'delete', $replay['id']), null, __('Are you sure you want to delete # %s?', $replay['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
