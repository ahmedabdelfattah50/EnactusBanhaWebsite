<?php

ob_start(); 
session_start();
$page_name = "Enactus Events";
$style = "add_member.css";
$script = "";
include "init.php";

if(isset($_SESSION['first_name'])) 
{
    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])){
        $name = $_POST['name']; 
        $year = $_POST['year'];
        if(isset($_FILES['mainImg'])){
            if(!empty($_FILES['mainImg'])){
                $mainImg = "";
            } else {
                $mainImg = "eventMainImg_" . $_FILES['mainImg']['name'];
            }
            move_uploaded_file($_FILES['mainImg']['tmp_name'],"img/events/$mainImg");
        }
        if(isset($_FILES['img_1']))
        {
            if(!empty($_FILES['img_1'])){
                $img_1 = "";
            } else {
                $img_1 = "eventImg1_" . $_FILES['img_1']['name'];
            }
            move_uploaded_file($_FILES['img_1']['tmp_name'],"img/events/$img_1");
        }
        if(isset($_FILES['img_2']))
        {
            if(!empty($_FILES['img_2'])){
                $img_2 = "";
            } else {
                $img_2 = "eventImg2_" . $_FILES['img_2']['name'];
            }
            move_uploaded_file($_FILES['img_2']['tmp_name'],"img/events/$img_2");
        }
        if(isset($_FILES['img_3']))
        {
            if(!empty($_FILES['img_3'])){
                $img_3 = "";
            } else {
                $img_3 = "eventImg3_" . $_FILES['img_3']['name'];
            }
            move_uploaded_file($_FILES['img_3']['tmp_name'],"img/events/$img_3");
        }
        if(isset($_FILES['img_4']))
        {
            if(!empty($_FILES['img_4'])){
                $img_4 = "";
            } else {
                $img_4 = "eventImg4_" . $_FILES['img_4']['name'];
            }
            move_uploaded_file($_FILES['img_4']['tmp_name'],"img/events/$img_4");
        }
        $driveLink = $_POST['driveLink'];

        $speaker_1 = $_POST['speaker_1'];
        $speaker_1_link = $_POST['speaker_1_link'];

        $speaker_2 = $_POST['speaker_2'];
        $speaker_2_link = $_POST['speaker_2_link'];

        $speaker_3 = $_POST['speaker_3'];
        $speaker_3_link = $_POST['speaker_3_link'];

        $speaker_4 = $_POST['speaker_4'];
        $speaker_4_link = $_POST['speaker_4_link'];

        $speaker_5 = $_POST['speaker_5'];
        $speaker_5_link = $_POST['speaker_5_link'];

        $speaker_6 = $_POST['speaker_6'];
        $speaker_6_link = $_POST['speaker_6_link'];

        $speaker_7 = $_POST['speaker_7'];
        $speaker_7_link = $_POST['speaker_7_link'];

        $speaker_8 = $_POST['speaker_8'];
        $speaker_8_link = $_POST['speaker_8_link'];

        $speaker_9 = $_POST['speaker_9'];
        $speaker_9_link = $_POST['speaker_9_link'];

        $speaker_10 = $_POST['speaker_10'];
        $speaker_10_link = $_POST['speaker_10_link'];

        $eventLocation = $_POST['eventLocation'];
        $desc = $_POST['desc'];


        addEvent(
            $name,
            $year,
            $mainImg, 
            $img_1, 
            $img_2, 
            $img_3, 
            $img_4, 
            $driveLink, 
            $speaker_1, 
            $speaker_1_link, 
            $speaker_2, 
            $speaker_2_link, 
            $speaker_3, 
            $speaker_3_link, 
            $speaker_4, 
            $speaker_4_link, 
            $speaker_5, 
            $speaker_5_link, 
            $speaker_6, 
            $speaker_6_link, 
            $speaker_7, 
            $speaker_7_link, 
            $speaker_8, 
            $speaker_8_link, 
            $speaker_9, 
            $speaker_9_link,
            $speaker_10, 
            $speaker_10_link,  
            $eventLocation, 
            $desc);
    }
    $seasonNames = selectSeason();
  ?> 

    
<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
<h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Add New Event</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
  <div class="form-row">

        <div class="form-group col-md-6">
            <label>Event Name</label>
            <input style="direction: ltr;" name="name" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="year">Season</label>
            <select class="custom-select ui search dropdown"  name="year" id="year" required>
                <option selected disabled value="">Choose...</option>
                <?php foreach($seasonNames as $seasonName){?>
                <option value="<?php echo $seasonName['year']?>"><?php echo $seasonName['year']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Main Image</label>
            <input style="direction: ltr;padding:0" name="mainImg" type="file" class="form-control">
        </div>
        <?php 
            for($i=1; $i<=4; $i++){ ?>
                <div class="form-group col-md-6">
                    <label>Image <?php echo $i?></label>
                    <input style="direction: ltr;padding:0" name="img_<?php echo $i?>" type="file" class="form-control">
                </div>
        <?php
            }
        ?>
        <div class="form-group col-md-6">
            <label>Images Drive link</label>
            <input style="direction: ltr;" name="driveLink" type="url" class="form-control">
        </div>
        <?php 
            for($i=1; $i<=10; $i++){ ?>
                <div class="form-group col-md-6">
                    <label>Speaker <?php echo $i?></label>
                    <input style="direction: ltr;" name="speaker_<?php echo $i?>" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Link of Speaker <?php echo $i?></label>
                    <input style="direction: ltr;" name="speaker_<?php echo $i?>_link" type="url" class="form-control">
                </div>
        <?php
            }
        ?>
        <div class="form-group col-md-12">
            <label>Event Location</label>
            <input style="direction: ltr;" name="eventLocation" type="text" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label>Description</label>
            <textarea name="desc" class="form-control" placeholder="Some Info About Event *" rows="4" autocomplete="off"></textarea>
        </div>
  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Add Event</button>
  <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="dashboard.php">Back</a>
</form>
</div>


<div class="footer text-center">
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Enactus Benha - IT Team 2021</a>.</strong>
            All rights reserved.
</div>

<?php
}else{
    header("location:signin.php");
}
ob_end_flush();