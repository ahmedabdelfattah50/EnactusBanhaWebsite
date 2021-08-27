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
          <!--start committees service-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item text-center">
                            <h3>IT Committee</h3>
                            <p> the team that provides technical assistance across the organization, such as installing new tools or troubleshooting software and hardware issues.</p>
                            <span class="members_num"><php echo count_comittee_members("id","members","IT") . " Member"; ?></span>
                           
                            <a href="committee_members.php?comity=IT" class="btn btn-primary team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                        </div>
                    </div> -->
          <!--end committees service-->
    
          <!--start committees service-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item text-center">
                            <h3>HR Committee</h3>
                            <p>The HR Team is the “one source alternative” to maintaining an in-house human resources department. The HR Team can customize a human resources solution based on the exact needs of your company or organization.</p>
                            <span class="members_num"><php echo count_comittee_members("id","members","HR") . " Member"; ?></span>
                           
                            <a href="committee_members.php?comity=HR" class="btn btn-primary team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                        </div>
                    </div> -->
          <!--end committees service-->
    
          <!--start committees service-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item text-center">
                            <h3>PM Committee</h3>
                            <p> A project management team includes a group of individuals with similar expertise who are grouped together. Their main aim is to achieve a certain task or goal. Often times, many organizations do have project team members for a long term or sometimes even for a short term</p>
                            <span class="members_num"><php echo count_comittee_members("id","members","PM") . " Member"; ?></span>
                           
                            <a href="committee_members.php?comity=PM" class="btn btn-primary team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                        </div>
                    </div> -->
          <!--end committees service-->
    
          <!--start committees service-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item text-center">
                            <h3>PRESENTATION Committee</h3>
                            <p> The presentation is the contact point or interface where all the work and effort put in by the team is finally on display. An effective team has to give the presentation due importance.</p>
                            <span class="members_num"><php echo count_comittee_members("id","members","Presentation") . " Member"; ?></span>
                           
                            <a href="committee_members.php?comity=Presentation" class="btn btn-primary team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                        </div>
                    </div> -->
          <!--end committees service-->
    
          <!--start committees service-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item text-center">
                            <h3>LOGISTICS Committee</h3>
                            <p> organize the storage and distribution of goods. They ensure the right products are delivered to the right location on time and at a good cost. They involved in transportation, stock control, warehousing and monitoring the flow of goods</p>
                            <span class="members_num"><php echo count_comittee_members("id","members","Logistics") . " Member"; ?></span>
                           
                            <a href="committee_members.php?comity=Logistics" class="btn btn-primary team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                        </div>
                    </div> -->
          <!--end committees service-->
    
          <!--start committees service-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item text-center">
                            <h3>MEDIA Committee</h3>
                            <p>Having a well-oiled media team will not only improve your interaction with the media, but will effectively hone and focus the messages and themes your group presents through the media to your members, volunteers, donors, supporters, helpers and stakeholders. A media team has three "legs": A media coordinator.</p>
                            <span class="members_num"><php echo count_comittee_members("id","members","Media") . " Member"; ?></span>
                           
                            <a href="committee_members.php?comity=Media" class="btn btn-primary team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                        </div>
                    </div> -->
          <!--end committees service-->
    
          <!--start committees service-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item text-center">
                            <h3>ER Committee</h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae officia laboriosam quisquam eligendi eos saepe accusamus. Illo alias sapiente, modi temporibus tenetur consectetur, doloremque expedita rerum cumque, soluta quis totam assumenda dolorum eveniet tempora nulla. Quos provident blanditiis alias eveniet?</p>
                            <span class="members_num"><php echo count_comittee_members("id","members","ER") . " Member"; ?></span>
                           
                            <a href="committee_members.php?comity=ER" class="btn btn-primary team_button"><i class="fal fa-users-crown pr-2"></i> Team Members </a>
                        </div>
                    </div> -->
          <!--end committees service-->

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