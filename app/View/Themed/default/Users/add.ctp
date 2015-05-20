<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('full_name');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
		echo $this->Form->input('email');
		echo $this->Form->input('sex', array('options' => array( 'male' => 'Male', 'female' => 'Female') ));
		echo $this->Form->input('date_of_birth');
		echo $this->Form->input('city');
		echo $this->Form->input('role', array('default' => 'user','type'=>'hidden' ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
