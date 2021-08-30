<?php
  ob_start(); 
  session_start();
  $page_name = "Committees";
  $style = "comm.css";
  $script = "members.js";
  include "init.php";
  if(isset($_SESSION['first_name'])){ 
?>

<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="comm_img" src="img/group.png" alt="group">
<h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Show All committees Info</p>

<div class='pb-3'>
    <a href="add_commitee.php" class="btn btn-info">Add New Committe <i class="fas fa-users"></i></a>
</div>

<div class="row">

    <?php 
        $allCommittes = selectCommity();
        foreach($allCommittes as $committeData){?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="item text-center">
                    <h3><?php echo $committeData['abbreviation'] ?> Committee</h3>
                    <p><?php echo $committeData['describtion'] ?></p>
                    <span class="members_num"><?php echo count_comittee_members("id","members",$committeData['name']) . " Member"; ?></span>
                    
                    <a href="committee_members.php?committe=<?php echo $committeData['name'] ?>" class="btn btn-success team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                    <a href="update_committe.php?id=<?php echo $committeData['id'] ?>" class="btn btn-primary team_button"><i class="far fa-edit ml-1"></i> Edit</a>
                </div>
            </div>
    <?php
        }
    ?>
</div>
</div>


<div class="footer text-center">
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Enactus Benha - IT Team 2021</a>.</strong>
            All rights reserved.
</div>
<?php

}

else{
    header("location:signin.php");
}
ob_end_flush();