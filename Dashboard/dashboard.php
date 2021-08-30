<?php 
  ob_start(); 
  session_start();
  $page_name = "Enactus Dashboard";
  $style = "dash.css";
  $script = "dash.js";
  include "init.php";
?>
    <div class="container">
      <h1 class="pt-5">Hollo .... <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></h1>
    </div>
    <nav >
      <div class="fixed-top bar d-flex justify-content-end bg-light py-2 px-5 col-sm-12  ">
         
      <a href="get_messages.php">
        <i class="far fa-comments"></i>
        <span class="badge badge-pill badge-success notification"><?php echo count_users("id","contact"); ?></span>
      </a>
      <a href="profile.php?from=dashboard&id=<?php echo  $_SESSION['id'] ?>">
        <i class="fas fa-user-shield"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="logout.php">
        <i class="fa fa-power-off"></i>
      </a>
      </div>
    </nav>

    
<div class="page-wrapper chiller-theme">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fa fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">ENACTUS</a>
        <div id="close-sidebar">
          <i class="fa fa-times"></i>
        </div>
      </div>
      
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li style="cursor: pointer;" class="sidebar-dropdown">
            <a class="s">
              <i class="far fa-plus-square"></i>
              <span>Add Data</span>
              <span class="badge badge-pill badge-warning">New</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="add_hoster.php">Add Hoster
                    <span class="badge badge-pill badge-success">Pro</span>
                  </a>
                </li>
                <li>
                  <a href="add_member.php">Add Member</a>
                </li>
                <li>
                  <a href="add_event.php">Add Event</a>
                </li>
              </ul>
            </div>
          </li>
          <li style="cursor: pointer;" class="sidebar-dropdown">
            <a class="s">
            <i class="far fa-edit"></i>
              <span>Update Data</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="update_hoster.php">Update Hoster
                  </a>
                </li>
                <li>
                  <a href="update_about.php">Update About US</a>
                </li>
                <li>
                  <a href="update_member.php">Update Member</a>
                </li>
                <li>
                  <a href="update_event.php">Update Event</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="about.php">
              <i class="fal fa-address-card"></i>
              <span>About us</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="event.php">
              <i class="fal fa-calendar-star"></i>
              <span>Event</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="commities.php">
              <i class="far fa-users"></i>
              <span>Committees</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="get_opinion.php">
            <i class="fal fa-user-md-chat"></i>
              <span>Opinions</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="get_messages.php">
              <i class="far fa-inbox-in"></i>
              <span>Messages</span>
            </a>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="profile.php?from=dashboard&id=<?php echo  $_SESSION['id'] ?>">
              <i class="fal fa-id-card-alt"></i>
              <span>profile</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="fal fa-sign-out-alt"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
   
  </nav>
  <!-- sidebar-wrapper  -->


    <!-- ///////////////// -->
    <section class=" container py-5">
      <div class="row dashBody">
        <div class="dashItem color1  rounded">
          <h3 class="itemNum"><?php echo count_new_highBoard(); ?></h3>
          <h4 class="itemName">High Board</h4>
          <a href="hosters.php?type=newBoard" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color4  rounded">
          <h3 class="itemNum"><?php echo countNewMembers(); ?></h3>
          <h4 class="itemName">Members</h4>
          <a href="members.php?type=newMembers" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fal fa-user-circle icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color4  rounded">
          <h3 class="itemNum"><?php echo countOldMembers(); ?></h3>
          <h4 class="itemName">Old Members</h4>
          <a href="members.php?type=oldMembers" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fal fa-user-circle icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color1  rounded">
          <h3 class="itemNum"><?php echo count_old_highBoard(); ?></h3>
          <h4 class="itemName">Old High Board</h4>
          <a href="hosters.php?type=oldBoard" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color2  rounded">
          <h3 class="itemNum"><?php echo count_aboutUs_sections();?></h3>
          <h4 class="itemName">About US</h4>
          <a href="about.php" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color3 changColor rounded">
          <h3 class="itemNum"><?php echo count_messages();?></h3>
          <h4 class="itemName">Messages</h4>
          <a href="get_messages.php" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color3 changColor rounded">
          <h3 class="itemNum">30</h3>
          <h4 class="itemName">Event</h4>
          <a href="event.php" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color2  rounded">
          <h3 class="itemNum">150</h3>
          <h4 class="itemName">Commities</h4>
          <a href="commities.php" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color1  rounded">
          <h3 class="itemNum">150</h3>
          <h4 class="itemName">Season</h4>
          <a href="season.php" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
        <div class="dashItem color4  rounded">
          <h3 class="itemNum">150</h3>
          <h4 class="itemName">Opinion</h4>
          <a href="get_opinion.php" class="lets">Lets Go <i class="fal fa-arrow-alt-right"></i></a>
          <i class="fa fa-users fa-2x icon"></i>
        </div><!-- ./dashItem -->
      </div><!-- ./dashItem -->

      </div><!-- ./row --> 
    </section> 