<?php
  ob_start(); 
  session_start();
  $page_name = "About US";
  $style = "add_member.css";
  $script = "members.js";
  include "init.php";
    if(isset($_SESSION['first_name'])){

        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $event_id = $_GET['id'];
            $result= getData_with_id("event",$event_id);
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"]) && !empty($_POST["desc"]) && !empty($_POST["link"]) && !empty($_POST["year"])){

                if(isset($_FILES['img'])){
                    $img = $_FILES['img']['name'];
                    move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                }
                $name = $_POST['name']; 
                $desc = $_POST['desc'];
                $year = $_POST['year'];
                $link = $_POST['link'];
        
             updateEvent($name ,$year ,$desc, $link,$img,$event_id);
         
            }

            $seasonNames = selectSeason();
            $event_data = getData_with_id("event",$_GET['id']);
?>

<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
<h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Update Event Data</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
  <div class="form-row">

  <div class="form-group col-md-6">
            <label>Event Name</label>
            <input style="direction: ltr;" type="text" class="form-control" value="<?php echo $event_data['e_name']?>">

            <!-- <input style="direction: ltr;" name="name" type="text"value="<php echo $result['ename'];?>" class="form-control"> -->
        </div>
        <div class="form-group col-md-6"> 
            <label for="year">Season</label>
            <!-- <select class="custom-select"  name="year" id="year" required>
                <option selected disabled value="">Choose...</option>
                <php for($i=1 ; $i<=date('Y')-2009 ; $i++){?>
                <option value="<php echo (2009 + $i + 1)?>"><php echo (2009 + $i + 1) ?></option>
            <php } ?>
            </select> -->

            <select class="custom-select ui search dropdown"  name="year" id="year" required>
                <option selected disabled value="">Choose...</option>
                <?php foreach($seasonNames as $seasonName){
                    if($seasonName['year'] == $event_data['e_season']){?>
                        <option value="<?php echo $seasonName['year']?>" selected><?php echo $seasonName['year']?></option>
                    <?php
                    } else { ?>
                        <option value="<?php echo $seasonName['year']?>"><?php echo $seasonName['year']?></option>
                    <?php } ?>
                <?php } ?>
            </select>

            <!-- <input style="direction: ltr;" type="text" class="form-control" value="<php echo $event_data['e_season']?>" readonly> -->
        </div>
        <!-- <div class="form-group col-md-6">
            <label> Photo</label>
            <input style="direction: ltr;padding:0" name="img" type="file" class="form-control"value="<php echo $result['img'];?>">
        </div> -->

        <div class="d-flex flex-wrap eventImgsTotal">
            <div class='d-flex flex-column'>
                <label>Main Image:</label>
                <?php 
                    if($event_data['main_img'] == null){?>
                    <img src="img/events/default.jpg" class="form-group col-md-6" alt="event image" style="width:700px;height:300px">
                <?php
                    } else {?>
                    <img src="img/events/<?php echo $event_data['main_img']?>" class="form-group col-md-6" alt="event image"style="width:700px;height:300px">
                <?php
                    } 
                ?>
                <input style="direction: ltr;padding:0" name="img_<?php echo $i?>" type="file" class="form-group col-md-6">
            </div>


            <div>
                <?php             
                for($i=1; $i<=4; $i++){
                    if($event_data['img_' . $i] == null){?>
                        <img src="img/events/default.jpg" class="form-group col-md-6" alt="event image" style="width:700px;height:300px">
                    <?php
                        } else {?>
                        <img src="img/events/<?php echo $event_data['img_' . $i]?>" class="form-group col-md-6" alt="event image" style="width:700px;height:300px">
                    <?php
                        }?>
                    <input style="direction: ltr;padding:0" name="img_<?php echo $i?>" type="file" class="form-group col-md-6">
                <?php
                } ?>  
            </div>

            <div class='col-12 mb-3'>
                <?php 
                if($event_data['imgs_link'] == null){?>
                <h2 class="form-group m-0 p-0 mb-3  alert alert-danger d-flex justify-content-center align-items-center">No images Link</h2>
                <?php
                } else {?>
                    <a href="<?php echo $event_data['imgs_link']?>" class="form-group m-0 pt-2 pb-2 mb-3 alert alert-success d-flex justify-content-center align-items-center"> <h2>images Link</h2></a>
                    <?php
                }
                ?> 
                <input style="direction: ltr;" name="driveLink" type="text" class="form-control" value="<?php echo $event_data['imgs_link']?>">
            </div>
        </div>


        <?php 
            for($i=1; $i<=10; $i++){ ?>
                <div class="form-group col-md-6">
                    <label>Speaker <?php echo $i?></label>
                    <input style="direction: ltr;" name="speaker_<?php echo $i?>" value='<?php echo $result['speaker_' . $i];?>' type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Link of Speaker <?php echo $i?></label>
                    <input style="direction: ltr;" name="speaker_<?php echo $i?>_link" value='<?php echo $result['speaker_' . $i . "_link"];?>' type="url" class="form-control">
                </div>
        <?php
            }
        ?>


        <div class="form-group col-md-12">
            <label>Event Location</label>
            <input style="direction: ltr;" name="eventLocation" value='<?php echo $result['e_location'];?>' type="text" class="form-control">
        </div>
        <!-- <div class="form-group col-md-6">
            <label> link</label>
            <input style="direction: ltr;"value="<php echo $result['link'];?>" name="link" type="url" class="form-control">
        </div> -->
        <div class="form-group col-md-12">
            <label> Description</label>
            <textarea name="desc" class="form-control" placeholder="Some Info About Event *" rows="4" autocomplete="off"><?php echo $result['descrip'];?></textarea>
        </div>

  </div>


  <button type="submit" class="btn btn-primary mb-5 mt-2">update about us </button>
  <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="event.php">Back</a>
  </div>
</form>
</div>


<div class="footer text-center">
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Enactus Benha - IT Team 2021</a>.</strong>
            All rights reserved.
</div>
<?php

}else{
    header("location:about_us.php");
}
}

else{
    header("location:dashboard.php");
}

ob_end_flush();