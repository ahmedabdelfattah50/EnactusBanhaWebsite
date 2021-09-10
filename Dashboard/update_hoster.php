<?php
  ob_start(); 
  session_start();
  $page_name = "Update Hoster Data";
  $style = "add_member.css";
  $script = "members.js";
  include "init.php";
    if(isset($_SESSION['first_name'])){
        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $hoster_id = $_GET['id'];
            $result= getData_with_id("hosters",$hoster_id);
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["first_name"]) && !empty($_POST["password"]) && !empty($_POST["email"]))
{
    $first_name = filter_var($_POST["first_name"] , FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["last_name"] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
    $pass = $_POST["password"] ;
    if(empty($pass)){
        $password = $result['password'];
    } else {
        $password = password_hash($pass, PASSWORD_DEFAULT);
    }
    $birthday = filter_var($_POST["birthday"] , FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_var($_POST["phone"] , FILTER_SANITIZE_NUMBER_INT);
    $position = filter_var($_POST["position"] , FILTER_SANITIZE_STRING);
    $commity = filter_var($_POST["commity"] , FILTER_SANITIZE_STRING);
    $season = filter_var($_POST["season"] , FILTER_SANITIZE_STRING);
    $university = filter_var($_POST["university"] , FILTER_SANITIZE_STRING);
    $collage_name = filter_var($_POST["collage_name"] , FILTER_SANITIZE_STRING);
    $collage_year = filter_var($_POST["collage_year"] , FILTER_SANITIZE_NUMBER_INT);
    $facebook = filter_var($_POST["facebook"] , FILTER_SANITIZE_URL);
    $twitter = filter_var($_POST["twitter"] , FILTER_SANITIZE_URL);
    $insta = filter_var($_POST["insta"] , FILTER_SANITIZE_URL);
    $linked_in = filter_var($_POST["linked_in"] , FILTER_SANITIZE_URL);
    $about = filter_var($_POST["about"] , FILTER_SANITIZE_STRING);
    $old = filter_var($_POST["old"] , FILTER_SANITIZE_NUMBER_INT);
    $avatar_name            = $_FILES["imgProfile"]["name"];
    $size                   = $_FILES["imgProfile"]["size"];
    $tmp_name               = $_FILES["imgProfile"]["tmp_name"];
    $type                   = $_FILES["imgProfile"]["type"];
    $avatar = rand(0,1000000) . "_" . $avatar_name ;
    $destination = "img/hosters/" . $avatar ;

    if(isset($_FILES['imgProfile']))
    {
        if(empty($_FILES['imgProfile']['name'])){
            $avatar = $result['photo'];
        } else {
            // $img_1 = "eventImg1_" . $_FILES['img_1']['name'];
            move_uploaded_file($_FILES['imgProfile']['tmp_name'],"img/hosters/$avatar");
        }
    }

    update_hoster ($hoster_id, $first_name , $last_name , $email , $password , $phone , $birthday , $position , $commity ,$season ,$university ,$collage_name ,$collage_year ,$about ,$facebook ,$twitter ,$insta ,$linked_in,$avatar ,$old);
    // insert_admin($name,$email,$hased,$gender);
};

$collageNames = selectCollage();
$universityNames = selectUniversity();
$commityNames = selectCommity();
$seasonNames = selectSeason();
$positionNames = selectPosition();
?>

<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
<h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Update Hoster Information</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
  <div class="form-row">
        <div class="form-group col-md-6">
            <label>First Name</label>
            <input style="direction: ltr;" value="<?php echo $result['first_name'];?>" name="first_name" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Last Name</label>
            <input style="direction: ltr;" value="<?php echo $result['last_name'];?>" name="last_name" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Email</label>
            <input style="direction: ltr;" value="<?php echo $result['email'];?>" name="email" type="email" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Password</label>
            <input style="direction: ltr;" name="password" type="password" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>phone</label>
            <input style="direction: ltr;" value="<?php echo $result['phone'];?>" name="phone" type="tel" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Birthday</label>
            <input style="direction: ltr;" value="<?php echo $result['birthday'];?>" name="birthday" type="date" class="form-control">
        </div>


        <div class="form-group col-md-6">
            <label for="position">Position</label>
            <select class="custom-select ui search dropdown"  name="position" id="position" required>
                <?php foreach($positionNames as $positionName){
                    if($result['position_name'] == $positionName['name']){?>
                        <option value="<?php echo $positionName['name']?>" selected><?php echo $positionName['name']?></option>
                <?php
                    } else { ?>
                    <option value="<?php echo $positionName['name']?>"><?php echo $positionName['name']?></option>
                <?php
                    }
                ?>
                <?php 
                } ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="commity">Commity</label>
            <select class="custom-select ui search dropdown"  name="commity" id="commity" required>
                <?php foreach($commityNames as $commityName){
                    if($result['commity_name'] == $commityName['name']){
                ?>
                    <option value="<?php echo $commityName['name']?>" selected><?php echo $commityName['name']?></option>
                <?php } else { ?>
                    <option value="<?php echo $commityName['name']?>"><?php echo $commityName['name']?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="season">Season</label>
            <select class="custom-select ui search dropdown"  name="season" id="season" required>
                <?php foreach($seasonNames as $seasonName){
                    if($result['season_year'] == $seasonName['id']){
                ?>
                    <option value="<?php echo $seasonName['id']?>" selected><?php echo $seasonName['year']?></option>
                <?php } else { ?>
                    <option value="<?php echo $seasonName['id']?>"><?php echo $seasonName['year']?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>University</label>
            <select class="custom-select ui search dropdown"  name="university" id="collage_year" required>
                <?php foreach($universityNames as $universityName){
                    if($result['university_name'] == $universityName['name']){
                ?>
                    <option value="<?php echo $universityName['name']?>" selected><?php echo $universityName['name']?></option>
                <?php } else { ?>
                    <option value="<?php echo $universityName['name']?>"><?php echo $universityName['name']?></option>
                <?php
                    }
                }
                ?>
            </select>        
        </div>
        
        <div class="form-group col-md-6">
            <label>Collage Name</label>         
            <select class="custom-select ui search dropdown"  name="collage_name" id="collage_year" required>
                <?php foreach($collageNames as $collageName){
                    if($result['college_name'] == $collageName['name']){
                ?>
                    <option value="<?php echo $collageName['name']?>" selected><?php echo $collageName['name']?></option>
                <?php } else { ?>
                    <option value="<?php echo $collageName['name']?>"><?php echo $collageName['name']?></option>
                <?php
                    }
                }
                ?>
            </select> 
        </div>
        
        <div class="form-group col-md-6">
            <label>Collage Year</label>
            <select class="custom-select ui search dropdown"  name="collage_year" id="collage_year" required>
                <?php for($i=1 ; $i<=6 ; $i++){
                    if($result['college_year'] == $i){ ?>
                        <option value="<?php echo $i?>" selected>Year <?php echo $i?></option>
                <?php
                        if($result['college_year'] == 6){ ?>
                            <option value="6" selected>Graduated</option>
                <?php
                        }
                    } else { ?>
                        <option value="<?php echo $i?>">Year <?php echo $i?></option>
                <?php
                        if($result['college_year'] == 6){ ?>
                            <option value="6" selected>Graduated</option>
                <?php
                        } 
                    }
                }
                ?>
            </select>
        </div>
        
        <div class="form-group col-md-6">
            <label>FaceBook</label>
            <input style="direction: ltr;" value="<?php echo $result['facebook'];?>" name="facebook" type="url" class="form-control">
        </div>
        
        <div class="form-group col-md-6">
            <label>Twitter</label>
            <input style="direction: ltr;" value="<?php echo $result['twitter'];?>" name="twitter" type="url" class="form-control">
        </div>
        
        <div class="form-group col-md-6">
            <label>Instagram</label>
            <input style="direction: ltr;" value="<?php echo $result['instgram'];?>" name="insta" type="url" class="form-control">
        </div>
        
        <div class="form-group col-md-6">
            <label>Linked In</label>
            <input style="direction: ltr;" value="<?php echo $result['linked_in'];?>" name="linked_in" type="url" class="form-control">
        </div>

        <div class="form-group col-md-12">
            <label>Member Photo</label>
            <?php 
                if(isset($result['photo'])){ ?>
                <div class="d-flex mb-2">
                    <img src="img/hosters/<?php echo $result['photo']?>" height="200px" width="300px" alt="">
                </div>
            <?php
                } else { ?>
                <div class="d-flex mb-2">
                    <img src="img/default.jpg" height="200px" width="300px" alt="">
                </div>
            <?php
                }
            ?> 
            <input style="direction: ltr;padding:0" name="imgProfile" type="file" class="form-control">
        </div>
                
        <div class="form-group col-md-6">
            <label for="old">Old Board ?</label>
            <select class="custom-select ui search dropdown"  name="old" id="old" required>
                

                <?php 
                    if($result['old'] == 1){ ?>
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                <?php
                    } else { ?>
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                <?php
                    }
                ?>
            </select>
        </div>
                
        <div class="form-group col-md-12">
            <label>About Hoster</label>
            <textarea name="about" class="form-control" placeholder="Some Info About member *" rows="4" autocomplete="off"><?php echo $result['about_hoster'];?></textarea>
        </div>

  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Update Hoster</button>
  <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="dashboard.php">Back</a>
</form>
</div>


<div class="footer text-center">
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Enactus Benha - IT Team 2021</a>.</strong>
            All rights reserved.
</div>
<?php

}else{
    header("location:members.php");
}
}

else{
    header("location:signin.php");
}
ob_end_flush();