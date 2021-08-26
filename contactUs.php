<!-- ============== Start header =============== -->
<?php 
    $pageTitle = "Contact Us";
    $pageStyle = "contactUs.css";
    $pageActive = "contact";
    $pageFooter = "NoFooter";
       
    include "init.php";
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
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="" class="form-control" rows="10" placeholder="Message" required></textarea>
                        </div>
                        <input type="submit" name="" value="Contact">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End contactUs =============== -->
<!-- ============== Start footer =============== -->
<?php 
    include $tempPath . "footer.php";
?>
<!-- ============== End footer =============== -->