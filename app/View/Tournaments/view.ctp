<div class="tournaments view">
<h2><?php  echo __('Tournament');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tournament['Tournament']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tournament['Tournament']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TypeField'); ?></dt>
		<dd>
			<?php echo h($tournament['Tournament']['typeField']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TypeAlias'); ?></dt>
		<dd>
			<?php echo h($tournament['Tournament']['typeAlias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Round'); ?></dt>
		<dd>
			<?php echo h($tournament['Tournament']['current_round']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ranked'); ?></dt>
		<dd>
			<?php echo h($tournament['Tournament']['ranked']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tournament'), array('action' => 'edit', $tournament['Tournament']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tournament'), array('action' => 'delete', $tournament['Tournament']['id']), null, __('Are you sure you want to delete # %s?', $tournament['Tournament']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Forum'), array('controller' => 'threads', 'action' => 'index')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rankings');?></h3>
	<?php if (!empty($tournament['Ranking'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Match Points'); ?></th>
		<th><?php echo __('Elo'); ?></th>
		<th><?php echo __('Bye'); ?></th>
		<th><?php echo __('Wins'); ?></th>
		<th><?php echo __('Draws'); ?></th>
		<th><?php echo __('Defeats'); ?></th>
		<th><?php echo __('Away'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tournament['Ranking'] as $ranking): ?>
		<tr>
			<td><?php echo $ranking['id'];?></td>
			<td><?php echo $ranking['tournament_id'];?></td>
			<td><?php echo $ranking['user_id'];?></td>
			<td><?php echo $ranking['match_points'];?></td>
			<td><?php echo $ranking['elo'];?></td>
			<td><?php echo $ranking['bye'];?></td>
			<td><?php echo $ranking['wins'];?></td>
			<td><?php echo $ranking['draws'];?></td>
			<td><?php echo $ranking['defeats'];?></td>
			<td><?php echo $ranking['away'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rankings', 'action' => 'view', $ranking['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rankings', 'action' => 'edit', $ranking['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rankings', 'action' => 'delete', $ranking['id']), null, __('Are you sure you want to delete # %s?', $ranking['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Rounds');?></h3>
	<?php if (!empty($tournament['Round'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tournament['Round'] as $round): ?>
		<tr>
			<td><?php echo $round['id'];?></td>
			<td><?php echo $round['number'];?></td>
			<td><?php echo $round['tournament_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rounds', 'action' => 'view', $round['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rounds', 'action' => 'edit', $round['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rounds', 'action' => 'delete', $round['id']), null, __('Are you sure you want to delete # %s?', $round['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Round'), array('controller' => 'rounds', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Signups');?></h3>
	<?php if (!empty($tournament['Signup'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tournament['Signup'] as $signup): ?>
		<tr>
			<td><?php echo $signup['id'];?></td>
			<td><?php echo $signup['tournament_id'];?></td>
			<td><?php echo $signup['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'signups', 'action' => 'view', $signup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'signups', 'action' => 'edit', $signup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'signups', 'action' => 'delete', $signup['id']), null, __('Are you sure you want to delete # %s?', $signup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Signup'), array('controller' => 'signups', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users');?></h3>
	<?php if (!empty($tournament['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Lastlogin'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Bnetaccount'); ?></th>
		<th><?php echo __('Bnetcode'); ?></th>
		<th><?php echo __('Race'); ?></th>
		<th><?php echo __('Admin'); ?></th>
		<th><?php echo __('Elo'); ?></th>
		<th><?php echo __('Division'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tournament['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
			<td><?php echo $user['lastlogin'];?></td>
			<td><?php echo $user['name'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['bnetaccount'];?></td>
			<td><?php echo $user['bnetcode'];?></td>
			<td><?php echo $user['race'];?></td>
			<td><?php echo $user['admin'];?></td>
			<td><?php echo $user['elo'];?></td>
			<td><?php echo $user['division'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
