<?php $this->Html->css('login', null, array('inline' => false)); ?>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <!-- <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset> -->
    <div class="">
    </div>
    <div class = "container col-md-4 col-md-offset-4">
	<div class="wrapper">
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  <input name="data[User][username]" class="form-control" placeholder="Username" maxlength="50" type="text" id="UserUsername" required="required"/>
			  <!-- <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" /> -->
			  <!-- <input type="password" class="form-control" name="Password" placeholder="Password" required=""/> -->
			  <input name="data[User][password]" class="form-control" type="password" id="UserPassword" required="required" placeholder="Password"/>    

			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Finish" type="Submit">Login</button>  			
		</form>			
	</div>
	</div>
</form>
</div>