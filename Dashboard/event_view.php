<?php

ob_start(); 
session_start();
$page_name = "Enactus Events";
$style = "view_event.css";
$script = "";
include "init.php";

if(isset($_SESSION['first_name']))
{
    $event_data = getData_with_id("event",$_GET['id']);
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
            <input style="direction: ltr;" type="text" class="form-control" value="<?php echo $event_data['e_name']?>" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="year">Season</label>
            <input style="direction: ltr;" type="text" class="form-control" value="<?php echo $event_data['e_season']?>" readonly>
        </div>
        
        <div class="d-flex flex-wrap eventImgsTotal">
            <?php 
                if($event_data['main_img'] == null){?>
                <img src="img/events/default.jpg" class="form-group col-md-6" alt="event image"style="width:100%;height:100%">
            <?php
                } else {?>
                <img src="img/events/<?php echo $event_data['main_img']?>" class="form-group col-md-6" alt="event image"style="width:100%;height:100%">
            <?php
                }
            ?>
            <?php 
            for($i=1; $i<=4; $i++){
                if($event_data['img_' . $i] == null){?>
                    <img src="img/events/default.jpg" class="form-group col-md-6" alt="event image" style="width:100%;height:100%">
                <?php
                    } else {?>
                    <img src="img/events/<?php echo $event_data['img_' . $i]?>" class="form-group col-md-6" alt="event image" style="width:100%;height:100%">
                <?php
                    }
            } ?>  
            <?php 
                if($event_data['imgs_link'] == null){?>
                <h2 class="form-group m-0 p-0 mb-3 col-md-6 alert alert-danger d-flex justify-content-center align-items-center">No images Link</h2>
            <?php
                } else {?>
                    <a href="<?php echo $event_data['imgs_link']?>" class="form-group m-0 p-0 mb-3 col-md-6 alert alert-success d-flex justify-content-center align-items-center" target="_blank"> <h2>images Link</h2></a>
            <?php
                }
            ?> 
        </div>        
        <?php
            for($i=1; $i<=10; $i++){    
                if($event_data['speaker_' . $i] == null){?>
            <?php
                } else {?>
                <div class="form-group col-md-6">
                    <label>Speaker <?php echo $i?></label>
                    <input style="direction: ltr;" value="<?php echo $event_data['speaker_' . $i] ?>" type="text" class="form-control" readonly>
                </div>  
                <div class="form-group col-md-6">
                    <label>Link of Speaker <?php echo $i?></label>
                    
                    <br>
                    <a style="font-size:20px;" href="<?php echo $event_data['speaker_' . $i . '_link'] ?>" target="_blank">Link <i class="fas fa-link"></i></a>
                    <!-- <input style="direction: ltr;" value="<php echo $event_data['speaker_' . $i . '_link'] ?>" type="url" class="form-control" readonly> -->
                </div>      
            <?php
                }
            }   
        ?> 
        <div class="form-group col-md-12">
            <label>Event Location</label>
            <input style="direction: ltr;" value="<?php echo $event_data['e_location']?>" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-md-12">
            <label>Description</label>
            <textarea class="form-control" rows="4" autocomplete="off" readonly><?php echo $event_data['descrip']?></textarea>
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