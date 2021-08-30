<?php

ob_start(); 
session_start();
$page_name = "Enactus Events";
$style = "add_member.css";
$script = "";
include "init.php"; 

if(isset($_SESSION['first_name'])) 
{
    $seasonOperation = $_GET['operation'];
    if( $seasonOperation == "edit"){
        $seasonId = $_GET['id'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['year'])){
        $year = $_POST['year']; 
        $active_season = $_POST['active_season'];   
        $statusSeason = $_POST['statusSeason'];    

        if($seasonOperation == "add" && $statusSeason == "addSeason"){
            addSeason($year, $active_season);
        } else if($seasonOperation == "edit" && $statusSeason == "editSeason"){
            updateSeason($year, $active_season, $seasonId);
        }
    }

    if($seasonOperation == "edit"){
        $seasonData = getData_with_id("season",$seasonId);
    }
?> 
<div class="container mb-3">
    <a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
    <h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
    <p class="text-center mb-5 pb-3">From This Page You Can Add New Event</p>

    <?php 
        if($seasonOperation == "add"){
    ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Season Year</label>
                <input style="direction: ltr;" name="year" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="year">Season Active</label>
                <select class="custom-select ui search dropdown"  name="active_season" id="year" required>
                    <option value="0" selected>No Active</option>
                    <option value="1">Active</option>
                </select>
            </div>
            <input type="text" name="statusSeason" value='addSeason' class='d-none'>
        </div>
        <button type="submit" class="btn btn-primary mb-5 mt-2" class='d-none'>Add Season</button>
        <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="dashboard.php">Back</a>
    </form>
    <?php
        }
    ?>
    <?php 
        if($seasonOperation == "edit"){
    ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Season Year</label>
                <input style="direction: ltr;" name="year" value="<?php echo $seasonData['year']?>" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="year">Season Active</label>
                <select class="custom-select ui search dropdown"  name="active_season" id="year" required>
                    <?php
                        if($seasonData['active_season'] == 0){?>
                            <option value="0" selected>No Active</option>
                            <option value="1">Active</option>
                            <?php
                        } else {?>
                            <option value="1" selected>Active</option>
                            <option value="0">No Active</option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <input type="text" name="statusSeason" value='editSeason' class='d-none'>
        </div>
        <button type="submit" class="btn btn-primary mb-5 mt-2">Update Season</button>
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