<?php
  ob_start(); 
  session_start();
  $page_name = "About US";
  $style = "add_member.css";
  $script = "members.js";
  include "init.php";
    if(isset($_SESSION['username'])){
        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $about_id = $_GET['id'];
            $result= getData_with_id("about_us",$about_id);
            if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['name']) && !empty($_POST['content']) )
            {
                $name         = $_POST['name'];
                $content      = $_POST['content'];
                update_about_us ($name , $content,$about_id);
               
               
            }
?>

<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
<h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Update About US Data</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
  <div class="form-row">

        <div class="form-group col-md-6">
            <label>Section Name</label>
            <input style="direction: ltr;" value="<?php echo $result['section_name'];?>" name="name" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Section Content</label>
            <textarea style="direction: ltr;" value="" name="content"class="form-control"><?php echo $result['content'];?></textarea>
        </div>


  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">update about us </button>
  <a class="btn btn-secondary pr-4 pl-4 ml-3 mb-5 mt-2" href="about.php">Back</a>
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