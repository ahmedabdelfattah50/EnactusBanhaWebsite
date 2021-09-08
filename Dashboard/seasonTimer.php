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
    //     $seasonTimerId = $_GET['id']; 
    // } 

    // if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["opinion"])) {
    //     $first_name = $_POST['first_name'];    
    //     $last_name = $_POST['last_name'];    
    //     $email = $_POST['email'];   
        
    //     $commity = $_POST['commity'];    
    //     $position = $_POST['position'];    
    //     $opinion = $_POST['opinion'];    
    //     $statusOpinion = $_POST['statusOpinion'];    

        // if($seasonTimerOperation == "add" && $statusOpinion == "addOpinion"){
        //     if(isset($_FILES['photo'])){
        //             $opinionPhoto = "opinionPhoto_" . $_FILES['photo']['name'];
        //         move_uploaded_file($_FILES['photo']['tmp_name'],"img/opinions/$opinionPhoto");
        //     } 
        //     addOpinion($first_name, $last_name, $email, $opinionPhoto, $commity, $position, $opinion);
        // } else if($seasonTimerOperation == "edit" && $statusOpinion == "editOpinion"){
        
        //     $result = getData_with_id("season_timer",$seasonTimerId);

        //     if(empty($_FILES['photo']['name'])){
        //         $opinionPhoto = $result['photo'];
        //     } else {
        //         $opinionPhoto = "opinionPhoto_" . $_FILES['photo']['name'];
        //         move_uploaded_file($_FILES['photo']['tmp_name'],"img/opinions/$opinionPhoto");
        //     }
        //     updateOpinion($first_name, $last_name, $email, $opinionPhoto, $commity, $position, $opinion, $seasonTimerId);
        // }

    // };

    // if($seasonTimerOperation == "edit"){
    //     $opinionData = getData_with_id("opinion",$seasonTimerId);
    // }

    // $commityNames = selectCommity();
    // $positionNames = selectPosition();

    $result = getData_with_id("season_timer",1);
?>


<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/opinion.png" alt="opinion">
<h3 class="text-center mt-4 mb-4">Welcome To Enactus Website .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Send Your Opinion To Board</p>
<a class="btn btn-primary pr-4 pl-4 ml-3 mb-5 mt-2" href="seasonTimer_update.php">Update Timer</a>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Date</label>
            <input style="direction: ltr;" name="date" value="<?php echo $result['date'] ?>" type="text" class="form-control" readonly>
        </div>
        <!-- <div class="form-group col-md-6">
            <label>Months</label>
            <input style="direction: ltr;" name="months" value="<?php echo $result['months'] ?>" type="text" class="form-control" readonly>
        </div> -->
        <!-- <div class="form-group col-md-6">
            <label>Days</label>
            <input style="direction: ltr;" name="days" value="<?php echo $result['days'] ?>" type="text" class="form-control" readonly>
        </div> -->
        <div class="form-group col-md-6">
            <label>Hours</label>
            <input style="direction: ltr;" name="hours" value="<?php echo $result['hours'] ?>" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-md-6">
            <label>Minutes</label>
            <input style="direction: ltr;" name="minutes" value="<?php echo $result['minutes'] ?>" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-md-6">
            <label>Seconds</label>
            <input style="direction: ltr;" name="seconds" value="<?php echo $result['seconds'] ?>" type="text" class="form-control" readonly>
        </div>
  </div>
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