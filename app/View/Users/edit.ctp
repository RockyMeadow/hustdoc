<?php if (AuthComponent::user('id')==$this->data['User']['id']) : ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
        echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => 'Usernames cannot be changed!'));
		echo $this->Form->input('full_name');
		echo $this->Form->input('email');
		echo $this->Form->input('sex', array('options' => array( 'male' => 'Male', 'female' => 'Female') ));
		echo $this->Form->input('date_of_birth');
		echo $this->Form->input('city');
		echo $this->Form->input('role', array('default' => 'User','type'=>'hidden' ));
		echo $this->Form->input('password_update', array( 'label' => 'New Password (leave empty if you do not want to change)', 'maxLength' => 255, 'type'=>'password','required' => 0));
        echo $this->Form->input('password_confirm_update', array('label' => 'Confirm New Password', 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
	?>
	</fieldset>
<?php echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		 <li><?php echo $this->Html->link("Back to the dashboard",'http://localhost/hustdoc.vn/admin'); ?></li>
        
        <li><?php echo $this->Html->link("Back to the main site", 'http://localhost/hustdoc.vn/topics' ); ?> </li>
        <br/><br/><br/>
        <li><?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?></li>
	</ul>
</div>
<?php endif ?>
<?php if (AuthComponent::user('id')!=$this->data['User']['id']) : ?>
<h1>You do not have permission to this information</h1>
<li><?php  echo $this->Html->link( "Back to the dashboard",'http://localhost/hustdoc.vn/admin');  ?></li>
<?php endif ?>