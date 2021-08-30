<!-- ============== Start header =============== -->
<?php 
    $pageTitle = "Contact Us";
    $pageStyle = "contactUs.css";
    $pageActive = "contact";
    // $pageFooter = "NoFooter";
       
    include "init.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["message"]))
    {
        $firstName = filter_var($_POST["firstName"] , FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST["lastName"] , FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST["subject"] , FILTER_SANITIZE_STRING);
        $message = filter_var($_POST["message"] , FILTER_SANITIZE_STRING);

        // ===== insert the data into the function =====
        insertMessage($firstName, $lastName, $email, $subject, $message);
    }
?> 
    <!-- ============== End header =============== -->
    <!-- ============== Start go_up icon =============== -->
    <i class="fas fa-angle-double-up go_up"><a href="#"></a></i>
    <!-- ============== End go_up icon =============== -->
    <!-- ============== Start pageHeader =============== -->
    <div class="pageHeader">
        <div class="container">
            <div class="pageHeaderHeader">
                <h2>CONTACT ENACTUS BANHA</h2>
                <h3><a href="index.html">Home </a><i class="fas fa-chevron-right"></i><a href="gallary.html"> CONTACT ENACTUS BANHA</a></h3>
            </div>
        </div>
    </div>
    <!-- ============== End pageHeader =============== -->
    <!-- ============== Start contactUs =============== -->
    <div class="contactUs">
        <div class="container">
            <div class="contactUsTotal d-flex flex-wrap align-items-center">
                <div class="contactUsImg col-md-8 col-lg-5 col-xl-6">
                    <img src="images/enactus_icon.png" alt="">
                </div>
                <div class="contactUsForm col-md-10 col-lg-7 col-xl-6">
                    <h2>Contact Us</h2>
                    <p>We will contact you as soon as possible</p>
                    <?php 
                        if(isset($successMessage)){?>
                            <p class='alert alert-success'><?php echo $successMessage ?></p>
                    <?php
                        }
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name='firstName' class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name='lastName' class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name='email' class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name='subject' class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" rows="10" placeholder="Message" required></textarea>
                        </div>
                        <input type="submit" name="" value="Contact">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End contactUs =============== -->
<!-- ============== Start footer =============== -->
<!-- <php 
    include $tempPath . "footer.php";
?> -->
<!-- ============== End footer =============== -->