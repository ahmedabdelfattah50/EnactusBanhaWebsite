<!-- ============== Start header =============== -->
<?php 
    $pageTitle = "Enactus Commtees";
    $pageStyle = "commtee.css";
    $pageActive = "commtees";
       
    include "init.php";
    if (isset($_GET['commtee'])){
        $commtee_id = base64_decode(urldecode($_GET['commtee']));
        $commteeData = getData_with_id("commity",$commtee_id);
?>
<!-- ============== End header =============== -->
    <!-- ============== Start go_up icon =============== -->
    <i class="fas fa-angle-double-up go_up"><a href="#"></a></i>
    <!-- ============== End go_up icon =============== -->
    <!-- ============== Start pageHeader =============== -->
    <div class="pageHeader">
        <div class="container">
            <div class="pageHeaderHeader">
                <h2><?php echo $commteeData['name']?> Commtee</h2>
                <h3><a href="index.php">Home </a><i class="fas fa-chevron-right"></i><a href="commtee.php?commtee=<?php echo urlencode(base64_encode($commtee_id))?>"> <?php echo $commteeData['name']?> Commtee</a></h3>
            </div>
        </div>
    </div>
    <!-- ============== End pageHeader =============== -->
    <!-- ============== Start commteeDescription =============== -->
    <div class="commteeDescription">
        <div class="container">
            <h2 class="commteeHeader text-center"><?php echo $commteeData['name']?> Commtee</h2>
            <div class="commteeData">
                <div class="commteeInfo">
                    <h2>Description :</h2>
                    <p><?php echo $commteeData['describtion']?></p>
                </div>
                <div class="commteeLeaders"> 
                    <?php 
                        $commityHeads = commityHeads($commteeData['name']);
                        if(!empty($commityHeads)){
                    ?>
                    <h2>Head : 
                        <div class="d-flex">
                            <?php 
                                foreach($commityHeads as $commityHead){
                            ?>
                                <a target="_blank" class="p-1 pr-2 pl-2 m-2" style="background: rgb(75, 73, 73); text-decoration:none; border-radius: 10px" href="<?php echo $commityHead['facebook']?>"><?php echo $commityHead['first_name'] . " " . $commityHead['last_name']?></a>
                            <?php 
                                }
                            ?>
                        </div>           
                    </h2>
                    <?php 
                        }
                        $commityViceHeads = commityViceHeads($commteeData['name']);
                        if(!empty($commityViceHeads)){
                    ?>
                    <h2>Vice Head : 
                        <div class="d-flex">
                                <?php 
                                    foreach($commityViceHeads as $commityViceHead){
                                ?>
                                    <a target="_blank" class="p-1 pr-2 pl-2 m-2" style="background: rgb(75, 73, 73); text-decoration:none; border-radius: 10px" href="<?php echo $commityViceHead['facebook']?>"><?php echo $commityViceHead['first_name'] . " " . $commityViceHead['last_name']?></a>
                                <?php 
                                    }
                                ?>
                        </div>
                    </h2>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End commteeDescription =============== -->
    <!-- ============== Start commteeMembers =============== -->
    <div class="commteeMembers">
        <div class="container">
            <div class="commteeMembersHeader text-center">
                <h2>Members</h2>
            </div>
            <div class="box-menu">
                <ul class="d-flex justify-content-center flex-wrap">
                    <li class="mixitup-control-active" data-filter="*">All</li>
                    <?php 
                        $allSeasons = selectSeason();
                        foreach($allSeasons as $allSeason){?>
                            <li data-filter=".season<?php echo str_replace('/' , '_', $allSeason['year']) ?>"><?php echo $allSeason['year']?></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="box-list d-flex flex-wrap justify-content-center">

                <?php 
                    $commityPresidents = commityPresidents($commteeData['name']);
                    if(!empty($commityPresidents)){
                        foreach($commityPresidents as $commityPresident){
                            $seasonOfPresidents = getData_with_id('season',$commityPresident['season_year']);
                ?>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season<?php echo str_replace('/' , '_', $seasonOfPresidents['year']) ?>">
                    <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($commityPresident['id'])) ?>">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <?php 
                                    if(empty($commityPresident['photo'])){ ?>
                                        <img src="Dashboard/img/default.jpg" alt="">
                                <?php
                                    }else {
                                ?>
                                    <img src="Dashboard/img/hosters/<?php echo $commityPresident['photo']?>" alt="">
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2><?php echo $commityPresident['first_name'] . " " . $commityPresident['last_name'] ?></h2></a>
                                <h3>Head of <?php echo $commteeData['name'] ?> Commity</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <?php 
                                    if(!empty($commityPresident['facebook'])){?>
                                        <a href="<?php echo $commityPresident['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityPresident['instgram'])){?>
                                        <a href="<?php echo $commityPresident['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityPresident['twitter'])){?>
                                        <a href="<?php echo $commityPresident['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityPresident['linked_in'])){?>
                                        <a href="<?php echo $commityPresident['linked_in']?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php 
                    }}
                ?>



                <?php 
                    $commityVicePresidents = commityVicePresidents($commteeData['name']);
                    if(!empty($commityVicePresidents)){
                        foreach($commityVicePresidents as $commityVicePresident){
                            $seasonOfVicePresidents = getData_with_id('season',$commityVicePresident['season_year']);
                ?>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season<?php echo str_replace('/' , '_', $seasonOfVicePresidents['year']) ?>">
                    <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($commityVicePresident['id'])) ?>">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <?php 
                                    if(empty($commityVicePresident['photo'])){ ?>
                                        <img src="Dashboard/img/default.jpg" alt="">
                                <?php
                                    }else {
                                ?>
                                    <img src="Dashboard/img/hosters/<?php echo $commityVicePresident['photo']?>" alt="">
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2><?php echo $commityVicePresident['first_name'] . " " . $commityVicePresident['last_name'] ?></h2></a>
                                <h3>Head of <?php echo $commteeData['name'] ?> Commity</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <?php 
                                    if(!empty($commityVicePresident['facebook'])){?>
                                        <a href="<?php echo $commityVicePresident['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityVicePresident['instgram'])){?>
                                        <a href="<?php echo $commityVicePresident['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityVicePresident['twitter'])){?>
                                        <a href="<?php echo $commityVicePresident['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityVicePresident['linked_in'])){?>
                                        <a href="<?php echo $commityVicePresident['linked_in']?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php 
                    }}
                ?>



                <?php
                    $commityProjectManagers = commityProjectManagers($commteeData['name']);
                    if(!empty($commityProjectManagers)){
                        foreach($commityProjectManagers as $commityProjectManager){
                            $seasonOfProjectManager = getData_with_id('season',$commityProjectManager['season_year']);
                ?>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season<?php echo str_replace('/' , '_', $seasonOfProjectManager['year']) ?>">
                    <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($commityVicePresident['id'])) ?>">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <?php 
                                    if(empty($commityProjectManager['photo'])){ ?>
                                        <img src="Dashboard/img/default.jpg" alt="">
                                <?php
                                    }else {
                                ?>
                                    <img src="Dashboard/img/hosters/<?php echo $commityProjectManager['photo']?>" alt="">
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2><?php echo $commityProjectManager['first_name'] . " " . $commityProjectManager['last_name'] ?></h2></a>
                                <h3>Head of <?php echo $commteeData['name'] ?> Commity</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <?php 
                                    if(!empty($commityProjectManager['facebook'])){?>
                                        <a href="<?php echo $commityProjectManager['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityProjectManager['instgram'])){?>
                                        <a href="<?php echo $commityProjectManager['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityProjectManager['twitter'])){?>
                                        <a href="<?php echo $commityProjectManager['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityProjectManager['linked_in'])){?>
                                        <a href="<?php echo $commityProjectManager['linked_in']?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php 
                    }}
                ?>


                <?php 
                    $commityHeads = commityHeads($commteeData['name']);
                    if(!empty($commityHeads)){
                        foreach($commityHeads as $commityHead){
                            $seasonOfHead = getData_with_id('season',$commityHead['season_year']);
                ?>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season<?php echo str_replace('/' , '_', $seasonOfHead['year']) ?>">
                    <a href="profile.php?person=head&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($commityHead['id'])) ?>">
                        <div class="memberSec headCommtee">
                            <div class="memberImgSec">
                                <?php 
                                    if(empty($commityHead['photo'])){ ?>
                                        <img src="Dashboard/img/default.jpg" alt="">
                                <?php
                                    }else {
                                ?>
                                    <img src="Dashboard/img/hosters/<?php echo $commityHead['photo']?>" alt="">
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2><?php echo $commityHead['first_name'] . " " . $commityHead['last_name'] ?></h2></a>
                                <h3>Head of <?php echo $commteeData['name'] ?> Commity</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <?php 
                                    if(!empty($commityHead['facebook'])){?>
                                        <a href="<?php echo $commityHead['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityHead['instgram'])){?>
                                        <a href="<?php echo $commityHead['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityHead['twitter'])){?>
                                        <a href="<?php echo $commityHead['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityHead['linked_in'])){?>
                                        <a href="<?php echo $commityHead['linked_in']?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php 
                    }}
                ?>

                <?php 
                    $commityViceHeads = commityViceHeads($commteeData['name']);
                    if(!empty($commityViceHeads)){
                        foreach($commityViceHeads as $commityViceHead){
                            $seasonOfViceHead = getData_with_id('season',$commityViceHead['season_year']);
                ?>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season<?php echo str_replace('/' , '_', $seasonOfViceHead['year']) ?>">
                    <a href="profile.php?person=vice_head&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($commityViceHead['id'])) ?>">
                        <div class="memberSec viceCommtee">
                            <div class="memberImgSec">
                                <?php 
                                    if(empty($commityViceHead['photo'])){ ?>
                                        <img src="Dashboard/img/default.jpg" alt="">
                                <?php
                                    }else {
                                ?>
                                    <img src="Dashboard/img/hosters/<?php echo $commityViceHead['photo']?>" alt="">
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2><?php echo $commityViceHead['first_name'] . " " . $commityViceHead['last_name'] ?></h2></a>
                                <h3>Vice of <?php echo $commteeData['name'] ?> Commity</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <?php 
                                    if(!empty($commityViceHead['facebook'])){?>
                                        <a href="<?php echo $commityViceHead['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityViceHead['instgram'])){?>
                                        <a href="<?php echo $commityViceHead['instgram']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityViceHead['twitter'])){?>
                                        <a href="<?php echo $commityViceHead['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityViceHead['linked_in'])){?>
                                        <a href="<?php echo $commityViceHead['linked_in']?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php 
                    }}
                ?>

                <?php 
                    $commityMembers = commityMembers($commteeData['name']);
                    if(!empty($commityMembers)){
                        foreach($commityMembers as $commityMember){
                            $seasonOfMember = getData_with_id('season',$commityMember['season']);
                ?>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season<?php echo str_replace('/' , '_', $seasonOfMember['year']) ?>">
                    <a href="profile.php?person=member&commity=<?php echo urlencode(base64_encode($commtee_id)) ?>&id=<?php echo urlencode(base64_encode($commityMember['id'])) ?>">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <?php 
                                    if(empty($commityMember['img'])){ ?>
                                        <img src="Dashboard/img/default.jpg" alt="">
                                <?php
                                    }else {
                                ?>
                                    <img src="Dashboard/img/members/<?php echo $commityMember['img']?>" alt="">
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2><?php echo $commityMember['first_name'] . " " . $commityMember['last_name'] ?></h2></a>
                                <h3>Member at <?php echo $commityMember['commity'] ?></h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <?php 
                                    if(!empty($commityMember['facebook'])){?>
                                        <a href="<?php echo $commityMember['facebook']?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityMember['insta'])){?>
                                        <a href="<?php echo $commityMember['insta']?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityMember['twitter'])){?>
                                        <a href="<?php echo $commityMember['twitter']?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                <?php
                                    }
                                    if(!empty($commityMember['linked_in'])){?>
                                        <a href="<?php echo $commityMember['linked_in']?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php
                                    }
                                    if(empty($commityMember['facebook']) && empty($commityMember['insta']) && empty($commityMember['twitter']) && empty($commityMember['linked_in'])){?>
                                        <a style="cursor: no-drop">
                                            <i class="fas fa-ban"></i>
                                        </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php 
                    }}
                ?>

                <!-- 
                    

                        <div class="box-list d-flex flex-wrap justify-content-center">
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2020_2021">
                <php 
                    $commityHeads = commityHeads($commteeData['name']);
                    if(!empty($commityHeads)){
                ?>
                    <a href="#">
                        <div class="memberSec headCommtee">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                    <php 
                }
                ?>
                </div>

                <php 
                    $commityViceHeads = commityViceHeads($commteeData['name']);
                    if(!empty($commityViceHeads)){
                ?>
                    <php
                        foreach($commityViceHeads as $commityViceHead){?>
                            <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2020_2021">
                    
                    <a href="#">
                        <div class="memberSec headCommtee">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                    </div>
                <php 
                }}
                ?>

                 -->





                <!-- <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2020_2021">
                    <a href="#">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div> -->

                <!-- <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2020_2021">
                    <a href="#">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div> -->

                <!-- <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2019_2020">
                    <a href="#">
                        <div class="memberSec headCommtee">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2019_2020">
                    <a href="#">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2019_2020">
                    <a href="#">
                        <div class="memberSec">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 mix box-item season2018_2019">
                    <a href="#">
                        <div class="memberSec headCommtee">
                            <div class="memberImgSec">
                                <img src="images/team/2.jpg" alt="">
                            </div>
                            <div class="memberData text-center">
                                <a href="#"><h2>Prof. Ghada Amer</h2></a>
                                <h3>FACULTY ADVISOR</h3>
                            </div>
                            <div class="memberSocialMedia flex-column">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- ============== End commteeMembers =============== -->
<!-- ============== Start footer =============== -->
<?php 
    include $tempPath . "footer.php";
} else {
    header("location:dashboard.php");
}
?>
<!-- ============== End footer =============== -->