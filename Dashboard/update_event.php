<?php
  ob_start(); 
  session_start();
  $page_name = "About US";
  $style = "add_member.css";
  $script = "members.js";
  include "init.php";
    if(isset($_SESSION['username'])){
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
            <input style="direction: ltr;" name="name" type="text"value="<?php echo $result['ename'];?>" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="year">Year</label>
            <select class="custom-select"  name="year" id="year" required>
                <option selected disabled value="">Choose...</option>
                <?php for($i=1 ; $i<=date('Y')-2009 ; $i++){?>
                <option value="<?php echo (2009 + $i + 1)?>"><?php echo (2009 + $i + 1) ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label> Photo</label>
            <input style="direction: ltr;padding:0" name="img" type="file" class="form-control"value="<?php echo $result['img'];?>">
        </div>
        <div class="form-group col-md-6">
            <label> link</label>
            <input style="direction: ltr;"value="<?php echo $result['link'];?>" name="link" type="url" class="form-control">
        </div>
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