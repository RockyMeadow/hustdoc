<?php if(($document['Document']['visible']=='public') || 
	($document['Document']['visible']=='member only' && AuthComponent::user())  || 
	($document['Document']['visible']=='only me' && (AuthComponent::user('role')=='admin' || 
	AuthComponent::user('id')==$document['Document']['user_id']))) { ?>
	<div class="documents view">
		<h2><?php echo __('Document'); ?></h2>
		<?php
		$iframe_start = '<iframe allowtransparency="true" style="background:#000;"cframeborder="0" scrolling="no" src="http://localhost/pdf.js/web/viewer.html?file=';
		$iframe_end = '" height="545px" width="874px"></iframe>';
		$src = 'http://localhost/hustdoc.vn/app/webroot/uploads'. DS. $document['User']['id'].DS.$document['Document']['id']. DS. $document['Document']['filename']; 
		if ($document['Document']['type'] != 'application/pdf') {
			$src = $src . '.pdf'; 	
		}
		echo $iframe_start.$src.$iframe_end;
		?>
		<dl>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($document['Document']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($document['User']['username'], array('controller' => 'users', 'action' => 'view', $document['User']['username'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Summary'); ?></dt>
			<dd>
				<?php echo h($document['Document']['summary']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Likes'); ?></dt>
			<dd>
				<?php echo h($document['Document']['likes']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Body'); ?></dt>
			<dd>
				<?php echo ($document['Document']['body']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Size'); ?></dt>
			<dd>
				<?php echo h($document['Document']['size']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Author'); ?></dt>
			<dd>
				<?php echo h($document['Document']['author']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Views'); ?></dt>
			<dd>
				<?php echo h($document['Document']['views']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Downloads'); ?></dt>
			<dd>
				<?php echo h($document['Document']['downloads']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($document['Document']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($document['Document']['modified']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Visible'); ?></dt>
			<dd>
				<?php echo h($document['Document']['visible']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
>>>>>>> 71208da1bf176d623ba24db27c44e19d0585bec4
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Document'), array('action' => 'edit', $document['Document']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $document['Document']['id']), array(), __('Are you sure you want to delete # %s?', $document['Document']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link("Back to the dashboard",'http://localhost/hustdoc.vn/admin'); ?></li>

			<li><?php echo $this->Html->link("Back to the main site", 'http://localhost/hustdoc.vn/topics' ); ?> </li>
			<br/><br/><br/>

		</ul>
	</div>
	<div class="related">
		<h3><?php echo __('Related Comments'); ?></h3>
		<?php if (!empty($document['Comment'])): ?>
			<table cellpadding = "0" cellspacing = "0">
				<tr>
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('User Id'); ?></th>
					<th><?php echo __('Document Id'); ?></th>
					<th><?php echo __('Content'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($document['Comment'] as $comment): ?>
					<tr>
						<td><?php echo $comment['id']; ?></td>
						<td><?php echo $comment['user_id']; ?></td>
						<td><?php echo $comment['document_id']; ?></td>
						<td><?php echo $comment['content']; ?></td>
						<td><?php echo $comment['created']; ?></td>
						<td><?php echo $comment['modified']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3><?php echo __('Related Reports'); ?></h3>
		<?php if (!empty($document['Report'])): ?>
			<table cellpadding = "0" cellspacing = "0">
				<tr>
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('User Id'); ?></th>
					<th><?php echo __('Document Id'); ?></th>
					<th><?php echo __('Content'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($document['Report'] as $report): ?>
					<tr>
						<td><?php echo $report['id']; ?></td>
						<td><?php echo $report['user_id']; ?></td>
						<td><?php echo $report['document_id']; ?></td>
						<td><?php echo $report['content']; ?></td>
						<td><?php echo $report['created']; ?></td>
						<td><?php echo $report['modified']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('controller' => 'reports', 'action' => 'view', $report['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('controller' => 'reports', 'action' => 'edit', $report['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reports', 'action' => 'delete', $report['id']), array(), __('Are you sure you want to delete # %s?', $report['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	<?php }else{  ?>
	<h1>You do not have permission to this information</h1>
	<li><?php  echo $this->Html->link( "Back to the dashboard",'http://localhost/hustdoc.vn/admin');  ?></li>
	<?php } ?>
