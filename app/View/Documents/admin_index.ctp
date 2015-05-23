<div class="documents index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Documents'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Document'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Comments'), array('controller' => 'comments', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Comment'), array('controller' => 'comments', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Reports'), array('controller' => 'reports', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Report'), array('controller' => 'reports', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Topics'), array('controller' => 'topics', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Topic'), array('controller' => 'topics', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('summary'); ?></th>
						<th><?php echo $this->Paginator->sort('likes'); ?></th>
						<th><?php echo $this->Paginator->sort('body'); ?></th>
						<th><?php echo $this->Paginator->sort('size'); ?></th>
						<th><?php echo $this->Paginator->sort('author'); ?></th>
						<th><?php echo $this->Paginator->sort('views'); ?></th>
						<th><?php echo $this->Paginator->sort('downloads'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th><?php echo $this->Paginator->sort('visible'); ?></th>
						<th><?php echo $this->Paginator->sort('filename'); ?></th>
						<th><?php echo $this->Paginator->sort('type'); ?></th>
						<th><?php echo $this->Paginator->sort('hash'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($documents as $document): ?>
					<tr>
						<td><?php echo h($document['Document']['id']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['name']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($document['User']['id'], array('controller' => 'users', 'action' => 'view', $document['User']['id'])); ?>
		</td>
						<td><?php echo h($document['Document']['summary']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['likes']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['body']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['size']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['author']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['views']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['downloads']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['created']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['modified']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['visible']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['filename']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['type']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['hash']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $document['Document']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $document['Document']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $document['Document']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $document['Document']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->