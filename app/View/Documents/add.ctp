<?php $this->Html->script('/TinyMCE/webroot/js/tiny_mce/tiny_mce.js', array(
    'inline' => false
));
?>	
<div class="documents form">
<?php echo $this->Form->create('Document', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Document'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->hidden('user_id',array('value'=>AuthComponent::user('id')));
		echo $this->Form->input('summary');
		echo $this->Form->hidden('likes',array('value'=>'0'));
		echo $this->Html->script('ckeditor/ckeditor');
		echo $this->Form->input('body',array('class'=>'ckeditor'));
		//echo $this->Form->input('body');
		echo $this->Form->hidden('size',array('value'=>'0'));
		echo $this->Form->input('author');
		echo $this->Form->hidden('views',array('value'=>'0'));
		echo $this->Form->hidden('downloads',array('value'=>'0'));
		echo $this->Form->input('Document.Topic',array('title'=>'Topic', 'type'=>'select', 'multiple'=>true));
		echo $this->Form->input('visible', array('options' => array( 'only me' => 'Only me', 'member only' => 'Member Only','public'=>'Public') ));
		echo $this->Form->file('Document.submittedfile'); 
		
	?>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
		 <li><?php echo $this->Html->link("Back to the dashboard",'http://localhost/hustdoc.vn/admin'); ?></li>
        
        <li><?php echo $this->Html->link("Back to the main site", 'http://localhost/hustdoc.vn/topics' ); ?> </li>
        <br/><br/><br/>
        <li><?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?></li>
	</ul>
</div>