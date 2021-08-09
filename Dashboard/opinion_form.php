<?php
  ob_start(); 
  session_start();
  $page_name = "Opinion Form";
  $style = "add_member.css";
  $script = "";
  include "init.php";
    if(isset($_SESSION['first_name'])){
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["opinion"]) || empty($_POST["season"]) || empty($_POST["commity"])){
        $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
        $opinion = filter_var($_POST["opinion"] , FILTER_SANITIZE_STRING);

        echo "
        <script>
            toastr.error('Sorry Season , Commity and Opinion Must be filled.')
        </script>";

    }else{
    $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
    $commity = filter_var($_POST["commity"] , FILTER_SANITIZE_STRING);
    $season = filter_var($_POST["season"] , FILTER_SANITIZE_STRING);
    $opinion = filter_var($_POST["opinion"] , FILTER_SANITIZE_STRING);
    insert_opinion ($name , $email ,$commity ,$season,$opinion);   
    }
};
?>

<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/opinion.png" alt="opinion">
<h3 class="text-center mt-4 mb-4">Welcome To Enactus Website .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Send Your Opinion To Board</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
  <div class="form-row">

        <div class="form-group col-md-6">
            <label>Name</label>
            <input value="<?php if (isset($name)){echo $name;}?>" style="direction: ltr;" name="name" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Email</label>
            <input value="<?php if (isset($email)){echo $email;}?>" style="direction: ltr;" name="email" type="email" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="commity">Commity</label>
            <select class="custom-select"  name="commity" id="commity">
                <option selected disabled value="">Choose...</option>
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
            <select class="custom-select"  name="season" id="season">
                <option selected disabled value="">Choose...</option>
                <?php for($i=1 ; $i<=date('Y')-2009 ; $i++){?>
                <option value="<?php echo (2009 + $i - 1) . " / " . (2009 + $i)?>"><?php echo (2009 + $i - 1) . " / " . (2009 + $i)?></option>
            <?php } ?>
            </select>
        </div>
                
        <div class="form-group col-md-12">
            <label>Your Opinion</label>
            <textarea name="opinion" class="form-control" placeholder="Please Enter Your Opinion Here *" rows="4" autocomplete="off"><?php if (isset($opinion)){echo $opinion;}?></textarea>
        </div>

        


  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Send Opinion</button>
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