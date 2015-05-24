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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-upload"></span>&nbsp;&nbsp;Upload New Document'), array('controller' => 'documents', 'action' => 'upload'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Topics'), array('controller' => 'topics', 'action' => 'index'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo 'No' ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('author'); ?></th>
						<th><?php echo $this->Paginator->sort('size'); ?></th>
						<th><?php echo $this->Paginator->sort('views'); ?></th>
						<th><?php echo $this->Paginator->sort('downloads'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php $count = 0; ?>
				<?php foreach ($documents as $document): ?>
					<?php $count++; ?>
					<tr>
						<td><?php echo $count; ?>&nbsp;</td>
						<td><?php echo h($document['Document']['name']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($document['User']['full_name'], array('controller' => 'users', 'action' => 'view', $document['User']['id'])); ?></td>
						<td><?php echo h($document['Document']['author']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['size']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['views']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['downloads']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['created']); ?>&nbsp;</td>
						<td><?php echo h($document['Document']['modified']); ?>&nbsp;</td>	
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

