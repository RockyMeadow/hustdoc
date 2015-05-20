<!-- app/View/Users/add.ctp -->

<?php 
$user = $this->Session->read('Auth.User');
if($user['role'] == 'admin') : ?>
<div class="users form">
<h1>CMS Admin Dashboard</h1>
<p>Welcome to the admin dashboard of the CMS. From here, there are many things that you can do. The following are all the things that you can do from the dashboard based on your role:
<ul>
<li><?php  echo $this->Html->link( "View Posts Listing",   array('controller'=>'topics','action'=>'index') );  ?></li>
<li><?php  echo $this->Html->link( "Create a new Documents",   array('controller'=>'documents','action'=>'add') );  ?></li>
<li><?php  echo $this->Html->link( "View Your Profile",   array('controller'=>'users','action'=>'admin_profile') );  ?></li>
<li><?php  echo $this->Html->link( "Edit Your Profile",   array('controller'=>'users','action'=>'admin_profile_edit') );  ?></li>
<li><?php  echo $this->Html->link( "View Documents Listing",   array('controller'=>'documents','action'=>'admin_index') );  ?></li>
<li><?php  echo $this->Html->link( "Create A New Topic",   array('controller'=>'topics','action'=>'admin_add') );  ?></li>
<li><?php  echo $this->Html->link( "View Active Users List",   array('controller'=>'users','action'=>'admin_index') );  ?></li>
<li><?php  echo $this->Html->link( "Create A New User",   array('controller'=>'users','action'=>'admin_add') );  ?></li>
<?php endif ?>
<?php if($user['role'] == 'user') : ?>
<div class="users form">
<h1>User Dashboard</h1>
<p>Welcome to the user dashboard of the CMS. From here, there are many things that you can do. The following are all the things that you can do from the dashboard based on your role:
<ul>
<li><?php  echo $this->Html->link( "View Posts Listing",   'http://localhost/hustdoc.vn/topics' );  ?></li>
<li><?php  echo $this->Html->link( "View Documents Listing",   'http://localhost/hustdoc.vn/documents' );  ?></li>
<li><?php  echo $this->Html->link( "Create a new Documents",  'http://localhost/hustdoc.vn/documents/add' );  ?></li>
<li><?php  echo $this->Html->link( "View Your Profile",   array('controller'=>'users','action'=>'admin_profile') );  ?></li>
<li><?php  echo $this->Html->link( "Edit Your Profile",   array('controller'=>'users','action'=>'admin_profile_edit') );  ?></li>

<?php endif ?>
<li><?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?></li>
</ul>
</p>
</div>
<div class="actions">
<h3><?php echo __('Actions'); ?></h3>
<ul>
<li><?php  echo $this->Html->link( "Back to the main site",'http://localhost/hustdoc.vn/topics' );  ?></li>
<br/><br/><br/>
<li><?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?></li>
</ul>
</div>	