<?php
ob_start(); 
session_start();
$page_name = "Opinion Form";
$style = "add_member.css";
$script = ""; 
include "init.php";
if(isset($_SESSION['first_name'])){

    // $seasonTimerOperation = $_GET['operation'];
    // if( $seasonTimerOperation == "edit"){
        // $seasonTimerId = $_GET['seasonTimerId'];
    // } 

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["date"]) && !empty($_POST["hours"]) && !empty($_POST["minutes"]) && !empty($_POST["seconds"])) {
        
        $date = $_POST['date'];    
        $hours = $_POST['hours'];    
        $minutes = $_POST['minutes'];    
        $seconds = $_POST['seconds'];    


        // if($seasonTimerOperation == "add" && $statusOpinion == "addOpinion"){
        //     if(isset($_FILES['photo'])){
        //             $opinionPhoto = "opinionPhoto_" . $_FILES['photo']['name'];
        //         move_uploaded_file($_FILES['photo']['tmp_name'],"img/opinions/$opinionPhoto");
        //     } 
        //     addOpinion($first_name, $last_name, $email, $opinionPhoto, $commity, $position, $opinion);
        // } 
        
        // $seasonTimerOperation == "edit" && $statusOpinion == "editOpinion"
        
        
        updateSeasonTimer($date, $hours, $minutes, $seconds);
        // }
        
    };
    
    $result = getData_with_id("season_timer",1);
    // if($seasonTimerOperation == "edit"){
        // $opinionData = getData_with_id("season_timer",$seasonTimerId);
    // }

    // $commityNames = selectCommity();
    // $positionNames = selectPosition();
?>


<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/opinion.png" alt="opinion">
<h3 class="text-center mt-4 mb-4">Welcome To Enactus Website .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Send Your Opinion To Board</p>

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
<div class="form-row">
        <div class="form-group col-md-6">
            <label>Date</label>
            <input style="direction: ltr;" name="date" value="<?php echo $result['date'] ?>" type="date" class="form-control">
        </div>
        <!-- <div class="form-group col-md-6">
            <label>Months</label>
            <input style="direction: ltr;" name="months" value="<?php echo $result['months'] ?>" type="text" class="form-control">
        </div> -->
        <!-- <div class="form-group col-md-6">
            <label>Days</label>
            <input style="direction: ltr;" name="days" value="<?php echo $result['days'] ?>" type="text" class="form-control">
        </div> -->
        <div class="form-group col-md-6">
            <label>Hours</label>
            <input style="direction: ltr;" name="hours" value="<?php echo $result['hours'] ?>" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Minutes</label>
            <input style="direction: ltr;" name="minutes" value="<?php echo $result['minutes'] ?>" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Seconds</label>
            <input style="direction: ltr;" name="seconds" value="<?php echo $result['seconds'] ?>" type="text" class="form-control">
        </div>
  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Update Opinion</button>
  <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="dashboard.php">Back</a>
</form>
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