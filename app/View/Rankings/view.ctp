<div class="rankings view">
<h2><?php  echo __('Ranking');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tournament'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $ranking['Tournament']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['User']['name'], array('controller' => 'users', 'action' => 'view', $ranking['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match Points'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['match_points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elo'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['elo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bye'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['bye']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wins'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['wins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Draws'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['draws']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defeats'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['defeats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Away'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['away']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ranking'), array('action' => 'edit', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ranking'), array('action' => 'delete', $ranking['Ranking']['id']), null, __('Are you sure you want to delete # %s?', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
