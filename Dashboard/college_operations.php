<?php

ob_start(); 
session_start();
$page_name = "Enactus Events";
$style = "add_member.css";
$script = "";
include "init.php"; 

if(isset($_SESSION['first_name']))  
{
    $collageOperation = $_GET['operation'];
    if( $collageOperation == "edit"){
        $collageId = $_GET['id'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])){
        $name = $_POST['name'];    
        $statusCollage = $_POST['statusCollage'];    

        if($collageOperation == "add" && $statusCollage == "addCollage"){
            addCollage($name);
        } else if($collageOperation == "edit" && $statusCollage == "editCollage"){
            updateCollage($name, $collageId);
        }
    }

    if($collageOperation == "edit"){
        $collageData = getData_with_id("collage",$collageId);
    }
?> 
<div class="container mb-3">
    <a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
    <h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
    <p class="text-center mb-5 pb-3">From This Page You Can Add New Event</p>

    <?php 
        if($collageOperation == "add"){
    ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>College Name</label>
                <input style="direction: ltr;" name="name" type="text" class="form-control">
            </div>
            <input type="text" name="statusCollage" value='addCollage' class='d-none'>
        </div>
        <button type="submit" class="btn btn-primary mb-5 mt-2" class='d-none'>Add College</button>
        <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="dashboard.php">Back</a>
    </form>
    <?php
        }
    ?>
    <?php 
        if($collageOperation == "edit"){
    ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>College Name</label>
                <input style="direction: ltr;" name="name" value="<?php echo $collageData['name']?>" type="text" class="form-control">
            </div>
            <input type="text" name="statusCollage" value='editCollage' class='d-none'>
        </div>
        <button type="submit" class="btn btn-primary mb-5 mt-2">Update College</button>
        <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="dashboard.php">Back</a>
    </form>
    <?php
        }
    ?>
</div>

<div class="footer text-center">
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Enactus Benha - IT Team 2021</a>.</strong>
            All rights reserved.
</div>

<?php
} else {
    header("location:signin.php");
}
ob_end_flush();