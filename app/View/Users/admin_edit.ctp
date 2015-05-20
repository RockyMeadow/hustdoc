<!-- app/View/Users/add.ctp -->
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
		echo $this->Form->input('role', array('options' => array( 'admin' => 'Admin', 'user' => 'User') ));
		echo $this->Form->input('password_update', array( 'label' => 'New Password (leave empty if you do not want to change)', 'maxLength' => 255, 'type'=>'password','required' => 0));
        echo $this->Form->input('password_confirm_update', array('label' => 'Confirm New Password', 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
   
		
		echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link("Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard')); ?></li>
        <li><?php echo $this->Html->link( "Back to users list",   array('controller'=>'users','action'=>'admin_index')); ?> </li>
        <li><?php echo $this->Html->link("Back to the main site",   array('controller'=>'topics','action'=>'admin_index') ); ?> </li>
        <br/><br/><br/>
        <li><?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?></li>
    </ul>
</div>