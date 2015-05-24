    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/hustdoc.vn/" style="color:  #ffffff;">HUST<span style="font: normal 18px 'Cookie',;color:  #5383d3;">DOC</span></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/hustdoc.vn/"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <div class="col-sm-7 col-md-7">
          <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                  <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#doc">Documents</a></li>
                      <li><a href="#user">Users</a></li>
                      <li><a href="#author">Authors</a></li>
                      <li><a href="#topic">Topics</a></li>
                      <li class="divider"></li>
                      <li><a href="#all">All</a></li>
                    </ul>
                  </div>
                  <input type="hidden" name="search_param" value="all" id="search_param">         
                  <input type="text" class="form-control" name="x" placeholder="Search term...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
                </div>
          </form>
          </div>
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