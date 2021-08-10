<?php
  ob_start(); 
  session_start();
  $page_name = "Update Member Data";
  $style = "add_member.css";
  $script = "members.js";
  include "init.php";
    if(isset($_SESSION['first_name'])){
        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $member_id = $_GET['id'];
            $result= getData_with_id("members",$member_id);
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]))
{
    $first_name = filter_var($_POST["first_name"] , FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["last_name"] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["phone"] , FILTER_SANITIZE_NUMBER_INT);
    $birthday = filter_var($_POST["birthday"] , FILTER_SANITIZE_NUMBER_INT);
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
    $avatar_name            = $_FILES["img"]["name"];
    $size                   = $_FILES["img"]["size"];
    $tmp_name               = $_FILES["img"]["tmp_name"];
    $type                   = $_FILES["img"]["type"];
    $ext_allowed            = array("png","jpg","jpeg","mp4","");
    @$extention             = strtolower(end(explode(".",$avatar_name)));
    if(in_array($extention,$ext_allowed)){
        $avatar = rand(0,1000000) . "_" . $avatar_name ;
        $destination = "img/members/" . $avatar ;
        update_member ($member_id,$first_name , $last_name , $email , $phone , $birthday ,$commity ,$season ,$university ,$collage_name ,$collage_year ,$about ,$facebook ,$twitter ,$insta ,$linked_in,$avatar,$old);
        move_uploaded_file($tmp_name,$destination);
        unlink("img/members/" . $result["img"]);
    } else{
        echo "error";
    }    
    // insert_admin($name,$email,$hased,$gender);
};
?>

<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
<h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Update Member Information</p>
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
            <label>phone</label>
            <input style="direction: ltr;" value="<?php echo $result['phone'];?>" name="phone" type="tel" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Birthday</label>
            <input style="direction: ltr;" value="<?php echo $result['birthday'];?>" name="birthday" type="date" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="commity">Commity</label>
            <select class="custom-select ui search dropdown"  name="commity" id="commity" required>
                <option selected value="<?php echo $result['commity'];?>"><?php echo $result['commity'];?></option>
                <option value="IT">IT</option>
                <option value="PM">PM</option>
                <option value="HR">HR</option>
                <option value="Presentation">Presentation</option>
                <option value="Media">Media</option>
                <option value="ER">ER</option>
                <option value="Logistics">Logistics</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="season">Season</label>
            <select class="custom-select ui search dropdown"  name="season" id="season" required>
                <option selected value="<?php echo $result['season'];?>"><?php echo $result['season'];?>s</option>
                <?php for($i=1 ; $i<=date('Y')-2009 ; $i++){?>
                <option value="<?php echo (2009 + $i - 1) . " / " . (2009 + $i)?>"><?php echo (2009 + $i - 1) . " / " . (2009 + $i)?></option>
            <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>University</label>
            <input style="direction: ltr;" value="<?php echo $result['university'];?>" name="university" type="text" class="form-control">
        </div>
        
        <div class="form-group col-md-6">
            <label>Collage Name</label>
            <input style="direction: ltr;" value="<?php echo $result['collage_name'];?>" name="collage_name" type="text" class="form-control">
        </div>
        
        <div class="form-group col-md-6">
            <label>Collage Year</label>
            <select class="custom-select ui search dropdown"  name="collage_year" id="collage_year" required>
                <option selected value="<?php echo $result['collage_year'];?>"><?php echo $result['collage_year'];?></option>
                <?php for($i=1 ; $i<=5 ; $i++){?>
                <option value="<?php echo $i?>">Year <?php echo $i?></option>
                <?php } ?>
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
            <input style="direction: ltr;" value="<?php echo $result['insta'];?>" name="insta" type="url" class="form-control">
        </div>
        
        <div class="form-group col-md-6">
            <label>Linked In</label>
            <input style="direction: ltr;" value="<?php echo $result['linked_in'];?>" name="linked_in" type="url" class="form-control">
        </div>

        <div class="form-group col-md-12">
            <label>Member Photo</label>
            <input style="direction: ltr;padding:0" name="img" type="file" class="form-control">
        </div>
                
                        
        <div class="form-group col-md-6">
            <label for="old">Old Member ?</label>
            <select class="custom-select ui search dropdown"  name="old" id="old" required>
                <option selected value="<?php echo $result['old_member'];?>"><?php echo $result['old_member'];?></option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <label>About Member</label>
            <textarea name="about" class="form-control" placeholder="Some Info About member *" rows="4" autocomplete="off"><?php echo $result['about'];?></textarea>
        </div>
  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Update Member</button>
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