<?php $count=0; ?>
<div class="topics index">
	<h2><?php echo __('Topics'); ?></h2>
	<?php 
		if (AuthComponent::user()){
			echo $this->HTML->link('Logout',array('controller'=>'users','action'=>'admin_logout'));
		} else {
			echo $this->HTML->link('Login',array('controller'=>'users','action'=>'login'));
		}
		?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>	
			<th><?php echo 'No.'; ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($topics as $topic): ?>
	<?php $count++; ?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo h($topic['Topic']['id']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($topic['User']['username'], array('controller' => 'users', 'action' => 'admin_profile', $topic['User']['username'])); ?>
		</td>
		<td><?php echo h($topic['Topic']['created']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $topic['Topic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $topic['Topic']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topic['Topic']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $topic['Topic']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link("Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard')); ?></li>
        <li><?php echo $this->Html->link("Back to the main site",   array('controller'=>'topics','action'=>'admin_index') ); ?> </li>
        <br/><br/><br/>
        <li><?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?></li>
	</ul>
</div>

