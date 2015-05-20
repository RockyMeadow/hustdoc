<div class="documents form">
<?php echo $this->Form->create('Document',array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Upload Document'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('summary');
		echo $this->Form->input('pages');
		echo $this->Form->input('likes');
		echo $this->Form->input('body');
		echo $this->Form->input('size');
		echo $this->Form->input('author');
		echo $this->Form->input('views');
		echo $this->Form->input('downloads');
		echo $this->Form->input('Document.Topic',array('title'=>'Topic', 'type'=>'select', 'multiple'=>true));
		echo $this->Form->input('visible', array('options' => array( 'only me' => 'Only me', 'member only' => 'Member Only','public'=>'Public') ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>