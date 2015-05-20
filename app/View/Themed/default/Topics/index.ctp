
<div class="topics index">
	<h2><?php echo __('Topics'); ?></h2>
	<?php 
		if (AuthComponent::user()){
			echo $this->HTML->link('Logout',array('controller'=>'users','action'=>'logout'));
		} else {
			echo $this->HTML->link('Login',array('controller'=>'users','action'=>'login'));
		}
		?>
	<?php $count=0; ?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'No.'; ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			
	</tr>
	</thead>
	<tbody>
	<?php foreach ($topics as $topic): ?>
	<?php $count++; ?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $this->Html->link(__(h($topic['Topic']['title'])), array('action' => 'view', $topic['Topic']['id'])); ?><td>
		
		<td><?php echo h($topic['Topic']['created']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['modified']); ?>&nbsp;</td>
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

		 <li><?php echo $this->Html->link("Back to the dashboard",'http://localhost/hustdoc.vn/admin'); ?></li>
        
        

	</ul>
</div>

