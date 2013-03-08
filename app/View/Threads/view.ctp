<div class="threads view">
<h2><?php  echo __('Thread');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Modified'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['date_modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Original Poster Id'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['original_poster_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Poster Id'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['last_poster_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Thread'), array('action' => 'edit', $thread['Thread']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Thread'), array('action' => 'delete', $thread['Thread']['id']), null, __('Are you sure you want to delete # %s?', $thread['Thread']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Posts');?></h3>
	<?php if (!empty($thread['Post'])):?>
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
		foreach ($thread['Post'] as $post): ?>
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
