<!-- ============== Start header =============== -->
<?php 
    $pageTitle = "Enactus";
    $pageStyle = "main.css";
    $pageActive = "home";

    include "init.php";
    $allEvents = getAllData("event");
?>
<!-- ============== End header =============== -->
    <!-- ============== Start go_up icon =============== -->
    <i class="fas fa-angle-double-up go_up"><a href="#"></a></i>
    <!-- ============== End go_up icon =============== -->
    <!-- ============== Start Main =============== -->
    <main>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div id="MainCarouselId" class="carousel slide col" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php  
                    $sliderCounter = 1;
                    foreach($allEvents as $allEvent){ ?>
                    <div class="carousel-item <?php 
                                if($sliderCounter == 1){
                                    echo 'active';
                                } ?>" 
                        style="background-image: url(Dashboard/img/events/<?php echo $allEvent['main_img']?>);">                            
                        <div class="container">
                            <div class="carousel-content d-flex flex-column justify-content-center align-items-center">
                                <div class="sliderContent text-center">
                                    <h2><?php echo $allEvent['e_name']?></h2>
                                    <h3><?php echo $allEvent['e_location']?></h3>
                                    <a href="event_data.php?event=<?php echo $allEvent['id']?>">View More <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $sliderCounter++;
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#MainCarouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#MainCarouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </main>
    <!-- ============== End Main =============== -->
    <!-- ============== Start enactusSeasonTimer =============== -->
    <div class="enactusSeasonTimer">
        <div class="container">        
            <div class="aboutEnactus d-flex align-items-center">
                <div class="enactusBrief col-12 col-lg-7">
                    <h3>ABOUT ENACTUS BANHA</h3>
                    <h2>WE CHANGE THE WORLD</h2>
                    <p>We established in 2016 and has since actively developed outreach community emporment projects to imporve quality of life and standard of living for many people in need.</p>
                </div>
                <div class="enactusBigLogo col-12 col-lg-5 d-flex justify-content-center">
                    <img src="images/enactus_icon.png" alt="Enactus">
                </div>
            </div>
            <div class="seasonTimer d-flex">
                <div class="seasonHeader col-12 col-lg-4">
                    <h3>SEASON TIME</h3>
                    <h2>WE COUNT EVERY SECOND UNTIL NEW GENERATION</h2>
                </div>
                <div class="seasonTimerSections col-12 col-lg-8 d-flex justify-content-center justify-content-sm-between align-items-center">
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2>00</h2>
                        <h3>Months</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2>00</h2>
                        <h3>Days</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2>00</h2>
                        <h3>Hours</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2>00</h2>
                        <h3>Minutes</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2>00</h2>
                        <h3>Seconds</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End enactusSeasonTimer =============== -->
    <!-- ============== Start ourHeads =============== -->
    <div class="ourHeads">
        <div class="container">
            <div class="ourHeadsHeader text-center">
                <h3>OUR TEAM</h3>
                <h2>WHO’S LEADING</h2>
            </div>
            <div class="allHeads d-flex justify-content-center justify-content-xl-start">
                <?php 
                    $newHighBoards = newBoardWithActiveSeason();
                ?>

                <?php 
                    foreach($newHighBoards as $newHighBoard){
                ?>
                    <a href="#">
                        <div class="headSec">
                            <div class="headImgSec">
                            <?php if(empty($newHighBoard['photo'])){?>
                                <img src="Dashboard/img/members/default.jpg" alt="Member" class="rounded-circle" width="120" height="120">
                            <?php
                            } else {?>
                                <img src="Dashboard/img/hosters/<?php echo $newHighBoard['photo']?>" alt="">
                            <?php
                            }
                            ?>
                            </div>
                            <div class="headData text-center">
                                <a href="#"><h2><?php echo $newHighBoard['first_name'] . " " . $newHighBoard['last_name']?></h2></a>
                                <h3>Head of <?php echo $newHighBoard['commity_name'] ?></h3>
                            </div>
                            <?php if(!empty($newHighBoard['facebook']) || !empty($newHighBoard['instgram']) || !empty($newHighBoard['twitter']) || !empty($newHighBoard['linked_in'])){ ?>
                            <div class="headSocialMedia flex-column">
                                <?php 
                                    if(isset($newHighBoard['facebook']) && !empty($newHighBoard['facebook'])){?>
                                        <a href="<?php echo $newHighBoard['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($newHighBoard['instgram']) && !empty($newHighBoard['instgram'])){?>
                                        <a href="<?php echo $newHighBoard['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($newHighBoard['twitter']) && !empty($newHighBoard['twitter'])){?>
                                        <a href="<?php echo $newHighBoard['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($newHighBoard['linked_in']) && !empty($newHighBoard['linked_in'])){?>
                                        <a href="<?php echo $newHighBoard['linked_in']?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </a>
                <?php 
                    }
                ?>                
            </div>
            <a href="#" class="viewMoreBtn">View More <i class="fas fa-angle-right"></i></a>
        </div>
    </div>
    <!-- ============== End ourHeads =============== -->
    <!-- ============== Start partnersSponsers =============== -->
    <div class="partnersSponsers">
        <div class="container">
            <h3 class="text-center">Partners & Sponsers</h3>
            <h2 class="text-center">Official sponser</h2>
            <div class="partnersSponsersLogos d-flex justify-content-center">
                <div class="logoSec">
                    <a href="#">
                        <img src="images/parteners_sponsers/Razzk_Company.png" alt="Razzk Company">
                    </a>
                </div>
                <div class="logoSec">
                    <a href="#">
                        <img src="images/parteners_sponsers/smartbasics.png" alt="Smart Basics">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End partnersSponsers =============== -->
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
    <!-- ============== Start ourProjects =============== -->
    <div class="ourProjects">
        <div class="container">
            <h3 class="text-center">Enactus</h3>
            <h2 class="text-center">Our Projects</h2>
            <div class="enactusProjectsLinks d-flex justify-content-center">
                <a href="#" style="background: #25d211;" class="text-center">R-Store</a>
                <a href="#" style="background: #3e35c7;" class="text-center">R-Store</a>
            </div>
        </div>
    </div>
    <!-- ============== End ourProjects =============== -->
    <!-- ============== Start ourBlog =============== -->
    <div class="ourBlog">
        <div class="container">
            <div class="ourBlogHeader text-center">
                <h3>OUR Blog</h3>
                <h2>LATEST NEWS</h2>
            </div>
            <div class="allBlogs d-flex justify-content-center justify-content-xl-start">
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 bigSecBlog">
                    <a href="#">
                        <div class="blogSec d-flex flex-column align-items-center">
                            <div class="blogImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="blogData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 bigSecBlog">
                    <a href="#">
                        <div class="blogSec d-flex flex-column align-items-center">
                            <div class="blogImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="blogData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a> 
                </div>
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 bigSecBlog">
                    <a href="#">
                        <div class="blogSec d-flex flex-column align-items-center">
                            <div class="blogImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="blogData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a> 
                </div>                 
            </div>
        </div>
    </div>
    <!-- ============== End ourBoard =============== -->
<!-- ============== Start footer =============== -->
<?php 
    include $tempPath . "footer.php";
?>
<!-- ============== End footer =============== -->