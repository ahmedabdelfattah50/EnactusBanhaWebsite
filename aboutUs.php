<!-- ============== Start header =============== -->
<?php 
    $pageTitle = "About Enactus";
    $pageStyle = "aboutUs.css";
    $pageActive = "aboutUs";

    include "init.php";
    $aboutUsData = aboutUsData();
?>
<!-- ============== End header =============== -->
    <!-- ============== Start go_up icon =============== -->
    <i class="fas fa-angle-double-up go_up"><a href="#"></a></i>
    <!-- ============== End go_up icon =============== -->
    <!-- ============== Start pageHeader =============== -->
    <div class="pageHeader">
        <div class="container">
            <div class="pageHeaderHeader">
                <h2>About Us</h2>
                <h3><a href="index.html">Home </a><i class="fas fa-chevron-right"></i><a href="aboutUs.html"> About Us</a></h3>
            </div>
        </div>
    </div>  
    <!-- ============== End pageHeader =============== -->
    <!-- ============== Start whatWeSee =============== -->
    <div class="whatWeSee">
        <div class="container">
            <h3 class="text-center">ENACTUS BANHA</h3>
            <h2 class="text-center">WHAT WE SEE</h2>
            <div class="whatWeSeeSections d-flex justify-content-center justify-content-lg-between">
                <div class="weSeeSec col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="totalWeSeeSec">
                        <div class="secIcon d-flex align-items-center justify-content-center">
                            <div class="imgContainer d-flex align-items-center justify-content-center">
                                <img src="images/core/visionIcon.png" alt="">
                            </div>
                        </div>
                        <div class="secContent text-center">
                            <h2>Vision</h2>
                            <p><?php echo $aboutUsData[0]['content']?></p>
                        </div>
                    </div>
                </div>
                <div class="weSeeSec col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="totalWeSeeSec">
                        <div class="secIcon d-flex align-items-center justify-content-center">
                            <div class="imgContainer d-flex align-items-center justify-content-center">
                                <img src="images/core/missionIcon.png" alt="">
                            </div>
                        </div>
                        <div class="secContent text-center">
                            <h2>Mission</h2>
                            <p><?php echo $aboutUsData[1]['content']?></p>
                        </div>
                    </div>
                </div>
                <div class="weSeeSec col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="totalWeSeeSec">
                        <div class="secIcon d-flex align-items-center justify-content-center">
                            <div class="imgContainer d-flex align-items-center justify-content-center">
                                <img src="images/core/goalIcon.png" alt="">
                            </div>
                        </div>
                        <div class="secContent text-center">
                            <h2>Goal</h2>
                            <p><?php echo $aboutUsData[2]['content']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End whatWeSee =============== -->
    <!-- ============== Start whatEnactus =============== -->
    <div class="whatEnactus">
        <div class="container">
            <h2 class="text-center">WHAT is Enactus ?</h2>
            <div class="whatEnactusSections d-flex justify-content-center justify-content-md-center justify-content-lg-between">
                <div class="whatEnactusSec col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="totalwhatEnactusSec">
                        <div class="secIcon d-flex align-items-center justify-content-center">
                            <div class="imgContainer d-flex align-items-center justify-content-center">
                                <img src="images/core/entrepreneurialIcon.png" alt="">
                            </div>
                        </div>
                        <div class="secContent text-center">
                            <h2>Entrepreneurial</h2>
                            <p><?php echo $aboutUsData[3]['content']?></p>
                        </div>
                    </div>
                </div>
                <div class="whatEnactusSec col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="totalwhatEnactusSec">
                        <div class="secIcon d-flex align-items-center justify-content-center">
                            <div class="imgContainer d-flex align-items-center justify-content-center">
                                <img src="images/core/actionIcon.png" alt="">
                            </div>
                        </div>
                        <div class="secContent text-center">
                            <h2>Action</h2>
                            <p><?php echo $aboutUsData[4]['content']?></p>
                        </div>
                    </div>
                </div>
                <div class="whatEnactusSec col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="totalwhatEnactusSec">
                        <div class="secIcon d-flex align-items-center justify-content-center">
                            <div class="imgContainer d-flex align-items-center justify-content-center">
                                <img src="images/core/usIcon.png" alt="">
                            </div>
                        </div>
                        <div class="secContent text-center">
                            <h2>Us</h2>
                            <p><?php echo $aboutUsData[5]['content']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End whatEnactus =============== -->
    <!-- ============== Start smallGallary =============== -->
    <div class="smallGallary">
        <div class="topGallary d-flex">
            <div class="imgContainer col-12 col-sm-6">
                <a id="single_image" href="images/gallary/alex1.jpg">
                    <img src="images/gallary/alex1.jpg" alt="">
                </a>
            </div>
            <div class="imgContainer col-12 col-sm-6">
                <a id="single_image" href="images/gallary/shine (1).jpg">
                    <img src="images/gallary/shine (1).jpg" alt="">
                </a>
            </div>
        </div>
        <div class="bottomGallary d-flex">
            <div class="imgContainer col-6 col-sm-3">
                <a id="single_image" href="images/gallary/shine (2).jpg">
                    <img src="images/gallary/shine (2).jpg" alt="">
                </a>
            </div>
            <div class="imgContainer col-6 col-sm-3">
                <a id="single_image" href="images/gallary/shine (3).jpg">
                    <img src="images/gallary/shine (3).jpg" alt="">
                </a>
            </div>
            <div class="imgContainer col-6 col-sm-3">
                <a id="single_image" href="images/gallary/alex2.jpg">
                    <img src="images/gallary/alex2.jpg" alt="">
                </a>
            </div>
            <div class="imgContainer col-6 col-sm-3">
                <a id="single_image" href="images/gallary/shine (4).jpg">
                    <img src="images/gallary/shine (4).jpg" alt="">
                </a>
            </div>
        </div>
    </div>
    <!-- ============== End smallGallary =============== -->
    <!-- ============== Start testimonial =============== -->
    <div class="testimonial">
        <div class="container">
            <div class="testimonialSay text-center">
                <h3>ENACTUS BANHA SAY</h3>
                <h2>WHAT WE FEEL</h2>
            </div>
            <div class="testmonial-slider d-flex justify-content-center text-center">
                <?php 
                    $allTestmonials = allTestmonials();
                    foreach($allTestmonials as $allTestmonial){
                ?>
                <div class="testmonial-item">
                    <p class="testmonial-text"><?php echo $allTestmonial['opinion'] ?></p>
                    <div class="testmonial-data d-flex flex-column align-items-center">
                        <?php 
                            if(empty($allTestmonial['photo'])){?>
                                <img src="Dashboard/img/opinions/default.jpg" class="rounded-circle" alt="member-image">
                        <?php
                            } else {?>
                                <img src="Dashboard/img/opinions/<?php echo $allTestmonial['photo']?>" class="rounded-circle" alt="member-image">
                        <?php
                            }
                        ?>
                        <h2 class="textmonial-name"><?php echo $allTestmonial['first_name'] . " " . $allTestmonial['last_name'] ?></h2>
                        <h3 class="testmonial-role"><?php echo $allTestmonial['position'] . " of " .  $allTestmonial['commity'] ?></h3>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- ============== End testimonial =============== -->
<!-- ============== Start footer =============== -->
<?php 
    include $tempPath . "footer.php";
?>
<!-- ============== End footer =============== -->