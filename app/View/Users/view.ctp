<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastlogin'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastlogin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bnetaccount'); ?></dt>
		<dd>
			<?php echo h($user['User']['bnetaccount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bnetcode'); ?></dt>
		<dd>
			<?php echo h($user['User']['bnetcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo h($user['User']['race']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin'); ?></dt>
		<dd>
			<?php echo h($user['User']['admin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elo'); ?></dt>
		<dd>
			<?php echo h($user['User']['elo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo h($user['User']['division']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Signups'), array('controller' => 'signups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Signup'), array('controller' => 'signups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comments');?></h3>
	<?php if (!empty($user['Comment'])):?>
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
		foreach ($user['Comment'] as $comment): ?>
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
	<h3><?php echo __('Related Posts');?></h3>
	<?php if (!empty($user['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Thread Id'); ?></th>
		<th><?php echo __('Date Posted'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['user_id'];?></td>
			<td><?php echo $post['thread_id'];?></td>
			<td><?php echo $post['date_posted'];?></td>
			<td><?php echo $post['body'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Rankings');?></h3>
	<?php if (!empty($user['Ranking'])):?>
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
		foreach ($user['Ranking'] as $ranking): ?>
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
	<h3><?php echo __('Related Signups');?></h3>
	<?php if (!empty($user['Signup'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Signup'] as $signup): ?>
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
	<h3><?php echo __('Related Tournaments');?></h3>
	<?php if (!empty($user['Tournament'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('TypeField'); ?></th>
		<th><?php echo __('TypeAlias'); ?></th>
		<th><?php echo __('Current Round'); ?></th>
		<th><?php echo __('Ranked'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Tournament'] as $tournament): ?>
		<tr>
			<td><?php echo $tournament['id'];?></td>
			<td><?php echo $tournament['name'];?></td>
			<td><?php echo $tournament['typeField'];?></td>
			<td><?php echo $tournament['typeAlias'];?></td>
			<td><?php echo $tournament['current_round'];?></td>
			<td><?php echo $tournament['ranked'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tournaments', 'action' => 'view', $tournament['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tournaments', 'action' => 'edit', $tournament['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tournaments', 'action' => 'delete', $tournament['id']), null, __('Are you sure you want to delete # %s?', $tournament['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
