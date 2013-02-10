<div class="replays view">
<h2><?php  echo __('Replay');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($replay['Replay']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($replay['Replay']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($replay['Replay']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($replay['Replay']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match'); ?></dt>
		<dd>
			<?php echo $this->Html->link($replay['Match']['id'], array('controller' => 'matches', 'action' => 'view', $replay['Match']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Replay'), array('action' => 'edit', $replay['Replay']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Replay'), array('action' => 'delete', $replay['Replay']['id']), null, __('Are you sure you want to delete # %s?', $replay['Replay']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
