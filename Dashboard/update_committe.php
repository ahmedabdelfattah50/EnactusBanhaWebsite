<?php
  ob_start(); 
  session_start();
  $page_name = "Add Member";
  $style = "add_member.css";
  $script = "members.js";
  include "init.php"; 
    if(isset($_SESSION['first_name'])){
        if(isset($_GET['id']) && is_numeric($_GET['id'])) {

            $commitee_id = $_GET['id'];
            $result = getData_with_id("commity",$commitee_id);

            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"]) && !empty($_POST["abbreviation"]) && !empty($_POST["describtion"])){

                $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
                $abbreviation = filter_var($_POST["abbreviation"] , FILTER_SANITIZE_STRING);
                $describtion = filter_var($_POST["describtion"] , FILTER_SANITIZE_STRING);
        
                updateCommitte($name, $abbreviation, $describtion,$commitee_id);   



                /*updateCommitte($name, $abbreviation, $describtion,$committeId){
                    global $con;
                    $stmt = $con->prepare("UPDATE commity SET name = ?,abbreviation = ?,describtion = ? WHERE id = ?");
                    $stmt->execute(
                    array(
                        $name,
                        $abbreviation,
                        $describtion,
                        $committeId
                    ));
                    echo "
                    <script>
                        toastr.success('Update , Committe INFO has Been Successfully Update.')
                    </script>";
                    header("Refresh:3;url=commities.php");
                }*/

            }
        
        };
?>

<div class="container mb-3">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <img class="add_member" src="img/add_member.png" alt="add_member">
<h3 class="text-center mt-4 mb-4">Welcome To Website Dashboard .</h3>
<p class="text-center mb-5 pb-3">From This Page You Can Add New Committee</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
  <div class="form-row">
        <div class="form-group col-md-6">
            <label>Name of Committee</label>
            <input style="direction: ltr;" name="name" value="<?php echo $result['name']?>" type="text" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Abbreviation of Committee</label>
            <input style="direction: ltr;" name="abbreviation" value="<?php echo $result['abbreviation']?>" type="text" class="form-control" required>
        </div>
        <div class="form-group col-md-12">
            <label>About Committee</label>
            <textarea name="describtion" class="form-control" placeholder="Some Info About committe *" rows="4" autocomplete="off" required><?php echo $result['describtion']?></textarea>
        </div>
  </div>
  <button type="submit" class="btn btn-primary mb-5 mt-2">Add Committee</button>
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