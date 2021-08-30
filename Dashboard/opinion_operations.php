<?php
ob_start(); 
session_start();
$page_name = "Opinion Form";
$style = "add_member.css";
$script = ""; 
include "init.php";
if(isset($_SESSION['first_name'])){

    $opinionOperation = $_GET['operation'];
    if( $opinionOperation == "edit"){
        $opinionId = $_GET['id'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["opinion"])) {

        // if(empty($_POST["opinion"]) || empty($_POST["season"]) || empty($_POST["commity"])){
        //     $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
        //     $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
        //     $opinion = filter_var($_POST["opinion"] , FILTER_SANITIZE_STRING);

        //     echo "
        //     <script>
        //         toastr.error('Sorry Season , Commity and Opinion Must be filled.')
        //     </script>";

        // }else{
        //     $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
        //     $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
        //     $commity = filter_var($_POST["commity"] , FILTER_SANITIZE_STRING);
        //     $season = filter_var($_POST["season"] , FILTER_SANITIZE_STRING);
        //     $opinion = filter_var($_POST["opinion"] , FILTER_SANITIZE_STRING);
        //     insert_opinion ($name , $email ,$commity ,$season,$opinion);   
        // }

        $first_name = $_POST['first_name'];    
        $last_name = $_POST['last_name'];    
        $email = $_POST['email'];    
        $commity = $_POST['commity'];    
        $position = $_POST['position'];    
        $opinion = $_POST['opinion'];    
        $statusOpinion = $_POST['statusOpinion'];    

        if($opinionOperation == "add" && $statusOpinion == "addOpinion"){
            addOpinion($first_name, $last_name, $email, $commity, $position, $opinion);
        } else if($opinionOperation == "edit" && $statusOpinion == "editOpinion"){
            updateOpinion($first_name, $last_name, $email, $commity, $position, $opinion, $opinionId);
        }

    };

    if($opinionOperation == "edit"){
        $opinionData = getData_with_id("opinion",$opinionId);
    }

    $commityNames = selectCommity();
    $positionNames = selectPosition();
?>


<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/opinion.png" alt="opinion">
<h3 class="text-center mt-4 mb-4">Welcome To Enactus Website .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Send Your Opinion To Board</p>

<?php 
    if($opinionOperation == "add"){
?>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
  <div class="form-row">
        <div class="form-group col-md-6">
            <label>First Name</label>
            <input style="direction: ltr;" name="first_name" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Last Name</label>
            <input style="direction: ltr;" name="last_name" type="text" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label>Email</label>
            <input style="direction: ltr;" name="email" type="email" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="commity">Commity</label>
            <select class="custom-select ui search dropdown" name="commity" id="commity" required>
                <option selected disabled value="">Choose...</option>
                <?php foreach($commityNames as $commityName){?>
                <option value="<?php echo $commityName['name']?>"><?php echo $commityName['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="position">Position</label>
            <select class="custom-select ui search dropdown" name="position" id="position" required>
                <option selected disabled value="">Choose...</option>
                <option value="Member">Member</option>
                <?php foreach($positionNames as $positionName){?>
                <option value="<?php echo $positionName['name']?>"><?php echo $positionName['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label>Your Opinion</label>
            <textarea name="opinion" class="form-control" placeholder="Please Enter Your Opinion Here *" rows="4" autocomplete="off"><?php if (isset($opinion)){echo $opinion;}?></textarea>
        </div>
        <input type="text" name="statusOpinion" value='addOpinion' class='d-none'>
  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Add Opinion</button>
  <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="dashboard.php">Back</a>
</form>
<?php
    }
?>
<?php 
    if($opinionOperation == "edit"){
?>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
  <div class="form-row">
        <div class="form-group col-md-6">
            <label>First Name</label>
            <input style="direction: ltr;" name="first_name" value="<?php echo $opinionData['first_name']?>" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Last Name</label>
            <input style="direction: ltr;" name="last_name" value="<?php echo $opinionData['last_name']?>" type="text" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label>Email</label>
            <input style="direction: ltr;" name="email" value="<?php echo $opinionData['email']?>" type="email" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="commity">Commity</label>
            <select class="custom-select ui search dropdown" name="commity" id="commity" required>
                <option selected disabled value="">Choose...</option>
                <?php foreach($commityNames as $commityName){?>
                <option value="<?php echo $commityName['name']?>"><?php echo $commityName['name']?></option>
                    <?php 
                    if($commityName['name'] == $opinionData['commity']){?>
                        <option value="<?php echo $commityName['name']?>" selected><?php echo $commityName['name']?></option>
                    <?php
                        } else {?>
                            <option value="<?php echo $commityName['name']?>"><?php echo $commityName['name']?></option>
                    <?php
                        }
                    ?>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="position">Position</label>
            <select class="custom-select ui search dropdown" name="position" id="position" required>
                <option selected disabled value="">Choose...</option>
                <?php 
                    if($opinionData['position'] == 'Member'){?>
                        <option value="Member" selected>Member</option>
                <?php
                    } else {?>
                        <option value="Member">Member</option>
                <?php
                    }
                ?>
                <?php foreach($positionNames as $positionName){?>
                    <?php 
                    if($positionName['name'] == $opinionData['position']){?>
                        <option value="<?php echo $positionName['name']?>" selected><?php echo $positionName['name']?></option>
                    <?php
                        } else {?>
                            <option value="<?php echo $positionName['name']?>"><?php echo $positionName['name']?></option>
                    <?php
                        }
                    ?>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label>Your Opinion</label>
            <textarea name="opinion" class="form-control" placeholder="Please Enter Your Opinion Here *" rows="4" autocomplete="off"><?php echo $opinionData['opinion']?></textarea>
        </div>
        <input type="text" name="statusOpinion" value='editOpinion' class='d-none'>
  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Update Opinion</button>
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

}

else{
    header("location:signin.php");
}
ob_end_flush();