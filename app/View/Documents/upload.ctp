<div class="documents form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Upload Document'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">

							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Documents'), array('action' => 'index'), array('escape' => false)); ?></li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Topics'), array('controller' => 'topics', 'action' => 'index'), array('escape' => false)); ?> </li>					
						</ul>
					</div>
				</div>
			</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Document', array('role' => 'form','type' => 'file')); ?>

			<div class="form-group">
				<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->hidden('user_id',array('value'=>AuthComponent::user('id')));?>
			</div>
			<div class="form-group">
				<?php $this->Form->input('summary', array('class' => 'form-control', 'placeholder' => 'Summary'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('author', array('class' => 'form-control', 'placeholder' => 'Author'));?>
			</div>
			<?php 
				echo $this->Form->hidden('views',array('value'=>'0'));
				echo $this->Form->hidden('downloads',array('value'=>'0'));
			 ?>
			<div class="form-group">
				<?php echo $this->Form->input('visible', array('class' => 'form-control', 'placeholder' => 'Filename', 'options' => array( 'only me' => 'Only me', 'member only' => 'Member Only','public'=>'Public'))); ?>
			</div>
			
			<div class="form-group">
				<?php echo $this->Form->input('Document.Topic', array('class' => 'form-control','title'=>'Topic', 'type'=>'select', 'multiple'=>true));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
			</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
