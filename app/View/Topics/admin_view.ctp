<div class="topics view">
<h2><?php echo __('Topic'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topic['User']['username'], array('controller' => 'users', 'action' => 'admin_profile', $topic['User']['username'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Download All Documents'), array('controller' => 'documents', 'action' => 'documentsdownload', $topic['Topic']['id'])); ?> </li> 
		<li><?php echo $this->Html->link(__('Edit Topic'), array('action' => 'edit', $topic['Topic']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Topic'), array('action' => 'delete', $topic['Topic']['id']), array(), __('Are you sure you want to delete # %s?', $topic['Topic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('Related Documents'); ?></h3>
	<?php if (!empty($topic['Document'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Summary'); ?></th>
		<th><?php echo __('Likes'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Size'); ?></th>
		<th><?php echo __('Author'); ?></th>
		<th><?php echo __('Views'); ?></th>
		<th><?php echo __('Downloads'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Visible'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($topic['Document'] as $document): ?>
		<tr>
			<td><?php echo $document['id']; ?></td>
			<td><?php echo $document['name']; ?></td>
			<td><?php echo $document['user_id']; ?></td>
			<td><?php echo $document['summary']; ?></td>
			<td><?php echo $document['likes']; ?></td>
			<td><?php echo $document['body']; ?></td>
			<td><?php echo $document['size']; ?></td>
			<td><?php echo $document['author']; ?></td>
			<td><?php echo $document['views']; ?></td>
			<td><?php echo $document['downloads']; ?></td>
			<td><?php echo $document['created']; ?></td>
			<td><?php echo $document['modified']; ?></td>
			<td><?php echo $document['visible']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'documents', 'action' => 'view', $document['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'documents', 'action' => 'edit', $document['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'documents', 'action' => 'delete', $document['id']), array(), __('Are you sure you want to delete # %s?', $document['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
