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
                                    <h2 style="text-transform: uppercase"><?php echo $allEvent['e_name']?></h2>
                                    <h3><?php echo $allEvent['e_location']?></h3>
                                    <a href="event_data.php?event=<?php echo urlencode(base64_encode($allEvent['id']))?>">View More <i class="fas fa-angle-right"></i></a>
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
                <?php 
                    $seasonTimerData = getData_with_id("season_timer",1);
                    $date = $seasonTimerData['date']; 
                    $h = $seasonTimerData['hours'];
                    $m = $seasonTimerData['minutes'];
                    $s = $seasonTimerData['seconds'];
                ?>
                <div class="seasonTimerSections col-12 col-lg-8 d-flex justify-content-center justify-content-sm-between align-items-center">
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2 id="monthsField">0</h2>
                        <h3>Months</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2 id="daysField">0</h2>
                        <h3>Days</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2 id="hoursField">0</h2>
                        <h3>Hours</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2 id="minutesField">0</h2>
                        <h3>Minutes</h3>
                    </div>
                    <div class="seasonTimerSec text-center d-flex flex-column justify-content-center">
                        <h2 id="secondsField">0</h2>
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
                    $president = newBoardPresidentWithActiveSeason();
                    $vicePresidents = newBoardVicePresidentWithActiveSeason();
                    $projectMangers = newBoardProjectManagerWithActiveSeason();
                    $newHighBoards = newBoardWithActiveSeason();

                    $commiteesData = getAllData("commity");                                    

                    foreach($commiteesData as $commityData){
                        if($commityData['name'] == 'President'){
                            $commityPresidentId = $commityData['id'];
                        }
                        
                        if($commityData['name'] == 'Vice President'){
                            $commityVicePresidentId = $commityData['id'];
                        }
                        
                        if($commityData['name'] == 'Project Manager'){
                            $commityProjectManagerId = $commityData['id'];
                        }
                    }
                ?>

                <?php if(!empty($president)){?>
                <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commityPresidentId)) ?>&id=<?php echo urlencode(base64_encode($president['id'])) ?>">
                    <div class="headSec president">
                        <div class="headImgSec">
                        <?php if(empty($president['photo'])){?>
                            <img src="Dashboard/img/members/default.jpg" alt="Member" class="rounded-circle" width="120" height="120">
                        <?php
                        } else {?>
                            <img src="Dashboard/img/hosters/<?php echo $president['photo']?>" alt="">
                        <?php
                        }
                        ?>
                        </div>
                        <div class="headData text-center">
                            <a href="#"><h2><?php echo $president['first_name'] . " " . $president['last_name']?></h2></a>
                            <h3><?php echo $president['commity_name'] ?></h3>
                        </div>
                        <?php if(!empty($president['facebook']) || !empty($president['instgram']) || !empty($president['twitter']) || !empty($president['linked_in'])){ ?>
                        <div class="headSocialMedia flex-column">
                            <?php 
                                if(isset($president['facebook']) && !empty($president['facebook'])){?>
                                    <a href="<?php echo $president['facebook']?>" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                            <?php
                                }
                            ?>
                            <?php 
                                if(isset($president['instgram']) && !empty($president['instgram'])){?>
                                    <a href="<?php echo $president['instgram']?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                            <?php
                                }
                            ?>
                            <?php 
                                if(isset($president['twitter']) && !empty($president['twitter'])){?>
                                    <a href="<?php echo $president['twitter']?>" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                            <?php
                                }
                            ?>
                            <?php 
                                if(isset($president['linked_in']) && !empty($president['linked_in'])){?>
                                    <a href="<?php echo $president['linked_in']?>" target="_blank">
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
                <?php } ?>
                
                <?php  
                    foreach($vicePresidents as $vicePresident){
                ?>
                    <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commityVicePresidentId)) ?>&id=<?php echo urlencode(base64_encode($vicePresident['id'])) ?>">
                        <div class="headSec vicePresident">
                            <div class="headImgSec">
                            <?php if(empty($vicePresident['photo'])){?>
                                <img src="Dashboard/img/members/default.jpg" alt="Member" class="rounded-circle" width="120" height="120">
                            <?php
                            } else {?>
                                <img src="Dashboard/img/hosters/<?php echo $vicePresident['photo']?>" alt="">
                            <?php
                            }
                            ?>
                            </div>
                            <div class="headData text-center">
                                <a href="#"><h2><?php echo $vicePresident['first_name'] . " " . $vicePresident['last_name']?></h2></a>
                                <h3>Vice President</h3>
                            </div>
                            <?php if(!empty($vicePresident['facebook']) || !empty($vicePresident['instgram']) || !empty($newHighBoard['twitter']) || !empty($newHighBoard['linked_in'])){ ?>
                            <div class="headSocialMedia flex-column">
                                <?php 
                                    if(isset($vicePresident['facebook']) && !empty($vicePresident['facebook'])){?>
                                        <a href="<?php echo $vicePresident['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($vicePresident['instgram']) && !empty($vicePresident['instgram'])){?>
                                        <a href="<?php echo $vicePresident['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($vicePresident['twitter']) && !empty($vicePresident['twitter'])){?>
                                        <a href="<?php echo $vicePresident['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($vicePresident['linked_in']) && !empty($vicePresident['linked_in'])){?>
                                        <a href="<?php echo $vicePresident['linked_in']?>" target="_blank">
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
                
                <?php  
                    foreach($projectMangers as $projectManger){
                ?>
                    <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commityProjectManagerId)) ?>&id=<?php echo urlencode(base64_encode($projectManger['id'])) ?>">
                        <div class="headSec projectManger">
                            <div class="headImgSec">
                            <?php if(empty($projectManger['photo'])){?>
                                <img src="Dashboard/img/members/default.jpg" alt="Member" class="rounded-circle" width="120" height="120">
                            <?php
                            } else {?>
                                <img src="Dashboard/img/hosters/<?php echo $projectManger['photo']?>" alt="">
                            <?php
                            }
                            ?>
                            </div>
                            <div class="headData text-center">
                                <a href="#"><h2><?php echo $projectManger['first_name'] . " " . $projectManger['last_name']?></h2></a>
                                <h3>Project Manager</h3>
                            </div>
                            <?php if(!empty($projectManger['facebook']) || !empty($projectManger['instgram']) || !empty($newHighBoard['twitter']) || !empty($newHighBoard['linked_in'])){ ?>
                            <div class="headSocialMedia flex-column">
                                <?php 
                                    if(isset($projectManger['facebook']) && !empty($projectManger['facebook'])){?>
                                        <a href="<?php echo $projectManger['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($projectManger['instgram']) && !empty($projectManger['instgram'])){?>
                                        <a href="<?php echo $projectManger['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($projectManger['twitter']) && !empty($projectManger['twitter'])){?>
                                        <a href="<?php echo $projectManger['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <?php 
                                    if(isset($projectManger['linked_in']) && !empty($projectManger['linked_in'])){?>
                                        <a href="<?php echo $projectManger['linked_in']?>" target="_blank">
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
                
                <?php  
                    foreach($newHighBoards as $newHighBoard){
                        $newHighBoard['commity_name'];
                        $commiteesData = getAllData("commity");
                        foreach($commiteesData as $commityData){
                            if($commityData['name'] == $newHighBoard['commity_name']){
                                $commtee_id = $commityData['id'];
                            }
                        }
                        
                        
                ?>
                    <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($newHighBoard['id'])) ?>">
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
                                <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($commityHead['id'])) ?>"><h2><?php echo $newHighBoard['first_name'] . " " . $newHighBoard['last_name']?></h2></a>
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
            <!-- <a href="#" class="viewMoreBtn">View More <i class="fas fa-angle-right"></i></a> -->
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
                <?php foreach($allEvents as $allEvent){ ?>
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 bigSecBlog">
                    <a href="event_data.php?event=<?php echo urlencode(base64_encode($allEvent['id']))?>">
                        <div class="blogSec d-flex flex-column align-items-center">
                            <div class="blogImgSec">
                                <img src="Dashboard/img/events/<?php echo $allEvent['main_img']?>" alt="">
                            </div>
                            <div class="blogData text-center">
                                <a href="event_data.php?event=<?php echo urlencode(base64_encode($allEvent['id']))?>"><h2 style="text-transform: uppercase"><?php echo $allEvent['e_name'] ?></h2></a>
                                <p><?php echo $allEvent['e_location'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- ============== End ourBoard =============== -->
<!-- ============== Start footer =============== -->
<?php 
    include $tempPath . "footer.php";
?>

<script>
    var countDownDate = <?php 
    echo strtotime("$date $h:$m:$s" ) ?> * 1000;
    var now = <?php echo time() ?> * 1000;
    // Update the count down every 1 second
    var x = setInterval(function() {
    now = now + 1000;
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var months = Math.floor(distance / (1000 * 60 * 60 * 24) / 30);
    var days = Math.floor(distance / (1000 * 60 * 60 * 24)) - (months * 30);
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="demo"
    document.getElementById("monthsField").innerHTML = months; 
    document.getElementById("daysField").innerHTML = days; 
    document.getElementById("hoursField").innerHTML = hours; 
    document.getElementById("minutesField").innerHTML = minutes; 
    document.getElementById("secondsField").innerHTML = seconds; 
    // If the count down is over, write some text 
    if (distance < 0) {
    clearInterval(x);
    document.getElementById("daysField").innerHTML = "EXPIRED";
    }
    }, 1000);
</script>
<!-- ============== End footer =============== -->