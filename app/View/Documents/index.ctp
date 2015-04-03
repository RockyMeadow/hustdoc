<div class="documents index">
	<h2><?php echo __('Documents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('summary'); ?></th>
			<th><?php echo $this->Paginator->sort('pages'); ?></th>
			<th><?php echo $this->Paginator->sort('likes'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('size'); ?></th>
			<th><?php echo $this->Paginator->sort('author'); ?></th>
			<th><?php echo $this->Paginator->sort('views'); ?></th>
			<th><?php echo $this->Paginator->sort('downloads'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('visible'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($documents as $document): ?>
	<tr>
		<td><?php echo h($document['Document']['id']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($document['User']['username'], array('controller' => 'users', 'action' => 'view', $document['User']['username'])); ?>
		</td>
		<td><?php echo h($document['Document']['summary']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['pages']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['likes']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['body']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['size']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['author']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['views']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['downloads']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['created']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['modified']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['visible']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $document['Document']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $document['Document']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $document['Document']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $document['Document']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
