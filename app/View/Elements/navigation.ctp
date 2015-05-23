    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">HUST Doc</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php 
            if (AuthComponent::user()){
              echo '<li class="dropdown">';
              echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.AuthComponent::user('full_name').'<span class="caret"></span></a>';
              echo '<ul class="dropdown-menu" role="menu">';
              echo '<li>'.$this->HTML->link('Edit Profile',array('controller'=>'users','action'=>'edit',AuthComponent::user('id'))).'</li>';
              echo '<li class="divider"></li>';
              echo '<li>'.$this->HTML->link('Sign Out',array('controller'=>'users','action'=>'logout')).'</li>';
              echo "</ul>";
              echo "</li>";
        } else {
          echo '<li><a href="http://localhost/hustdoc.vn/login">Sign in</a></li>';
          echo '<li><a href="http://localhost/hustdoc.vn/users/add">Sign up</a></li>';
        }
        ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<!-- <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
    <li class="divider"></li>
    <li><a href="#">One more separated link</a></li>
  </ul>
</li> -->