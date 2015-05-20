<?php if ($this->data['Document']['id']==AuthComponent::user('id')) : ?>
<div class="documents form">
<?php echo $this->Form->create('Document'); ?>
	<fieldset>
		<legend><?php echo __('Edit Document'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('user_id');
		echo $this->Form->input('summary');
		echo $this->Form->input('pages');
		echo $this->Html->script('ckeditor/ckeditor');
		echo $this->Form->input('body',array('class'=>'ckeditor'));
		echo $this->Form->input('size');
		echo $this->Form->input('author');
		echo $this->Form->input('Document.Topic',array('title'=>'Topic', 'type'=>'select', 'multiple'=>true));
		echo $this->Form->input('visible', array('options' => array( 'only me' => 'Only me', 'member only' => 'Member Only','public'=>'Public') ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Document.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Document.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
		 <li><?php echo $this->Html->link("Back to the dashboard",'http://localhost/hustdoc.vn/admin'); ?></li>
        
        <li><?php echo $this->Html->link("Back to the main site", 'http://localhost/hustdoc.vn/topics' ); ?> </li>
        <br/><br/><br/>
   
	</ul>
</div>
<?php endif ?>
<?php if (AuthComponent::user('id')!=$this->data['Document']['id']) : ?>
<h1>You do not have permission to this information</h1>
<li><?php  echo $this->Html->link( "Back to the dashboard",'http://localhost/hustdoc.vn/admin');  ?></li>
<?php endif ?>