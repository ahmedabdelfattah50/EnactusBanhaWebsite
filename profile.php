
<!-- ============== Start header =============== -->
<?php 
    $pageTitle = "Enactus Profile";
    $pageStyle = "profile.css";
    $pageActive = "commtees";
       
    include "init.php";
    if (isset($_GET['person']) && isset($_GET['id']) && isset($_GET['commity'])){
        if($_GET['person'] == "head"){
            $person_type = 'hosters';
        } else if($_GET['person'] == "vice_head"){
            $person_type = 'hosters';
        } else if($_GET['person'] == "member"){
            $person_type = 'members';
        }
        
        $commity_id = base64_decode(urldecode($_GET['commity']));
        $person_id = base64_decode(urldecode($_GET['id']));
        
        $personData = getData_with_id($person_type,$person_id);
?>
<!-- ============== End header =============== -->
    <!-- ============== Start go_up icon =============== -->
    <i class="fas fa-angle-double-up go_up"><a href="#"></a></i>
    <!-- ============== End go_up icon =============== -->
    <!-- ============== Start pageHeader =============== -->
    <div class="pageHeader">
        <div class="container">
            <div class="pageHeaderHeader">
                <h2><?php echo $personData['first_name'] . " " . $personData['last_name'] ?></h2>
                <?php 
                    if($person_type == "hosters"){
                ?>
                    <h3><a href="index.php">Home </a><i class="fas fa-chevron-right"></i><a href="commtee.php?commtee=<?php echo urlencode(base64_encode($commity_id)) ?>"> <?php echo $personData['commity_name']?> Commity</a></h3>
                <?php 
                    } else if($person_type == "members"){
                ?>
                    <h3><a href="index.php">Home </a><i class="fas fa-chevron-right"></i><a href="commtee.php?commtee=<?php echo urlencode(base64_encode($commity_id)) ?>"> <?php echo $personData['commity']?> Commity</a></h3>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- ============== End pageHeader =============== -->
    <!-- ============== Start personProfile =============== -->
    <?php 
        if($person_type == "hosters"){
    ?>
    <div class="personProfile">
        <div class="container">
            <h2 class="personHeader text-center"><?php echo $personData['first_name'] . " " . $personData['last_name'] ?></h2>
            <div class="personData">
                <div class="personImg d-flex justify-content-center">
                    <?php 
                        if(empty($personData['photo'])){ ?>
                            <img src="Dashboard/img/default.jpg" alt="">
                    <?php
                        }else {
                    ?>
                        <img src="Dashboard/img/hosters/<?php echo $personData['photo']?>" alt="">
                    <?php 
                        }
                    ?>
                </div>
                <div class="personInfo">
                    <h2>Name : <span><?php echo $personData['first_name'] . " " . $personData['last_name'] ?></span></h2>
                    <h2>Faculty : <span><?php echo $personData['college_name'] ?></span></h2>
                    <h2>University : <span><?php echo $personData['university_name'] ?> University</span></h2>
                    <h2>Class : <span><?php echo $personData['college_year'] ?></span></h2>
                    <h2>Commtee : <span><?php echo $personData['commity_name']?> Commity</span></h2>
                    <h2>Commtee Position : <span><?php echo $personData['position_name']?> of <?php echo $personData['commity_name']?></span></h2>
                    <h2 class="detailsHeader">Details : <span><?php echo $personData['about_hoster']?></span></h2>
                    <h2 class="socialMediaIcons">Social Media : 
                        <?php 
                            if(!empty($personData['facebook'])){?>
                                <a href="<?php echo $personData['facebook']?>" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                        <?php
                            }
                            if(!empty($personData['instgram'])){?>
                                <a href="<?php echo $personData['instgram']?>" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                        <?php
                            }
                            if(!empty($personData['twitter'])){?>
                                <a href="<?php echo $personData['twitter']?>" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                        <?php
                            }
                            if(!empty($personData['linked_in'])){?>
                                <a href="<?php echo $personData['linked_in']?>" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                        <?php
                            }
                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <?php 
        } else if($person_type == "members"){
    ?>
    <div class="personProfile">
        <div class="container">
            <h2 class="personHeader text-center"><?php echo $personData['first_name'] . " " . $personData['last_name'] ?></h2>
            <div class="personData">
                <div class="personImg d-flex justify-content-center">
                    <?php 
                        if(empty($personData['img'])){ ?>
                            <img src="Dashboard/img/default.jpg" alt="">
                    <?php
                        }else {
                    ?>
                        <img src="Dashboard/img/members/<?php echo $personData['img']?>" alt="">
                    <?php 
                        }
                    ?>
                </div>
                <div class="personInfo">
                    <h2>Name : <span><?php echo $personData['first_name'] . " " . $personData['last_name'] ?></span></h2>
                    <h2>Faculty : <span><?php echo $personData['collage_name'] ?></span></h2>
                    <h2>University : <span><?php echo $personData['university'] ?> University</span></h2>
                    <h2>Class : <span><?php echo $personData['collage_year'] ?></span></h2>
                    <h2>Commtee : <span><?php echo $personData['commity']?> Commity</span></h2>
                    <h2>Commtee Position : <span>Member at <?php echo $personData['commity']?></span></h2>
                    <h2 class="detailsHeader">Details : <span><?php echo $personData['about']?></span></h2>
                    <h2 class="socialMediaIcons">Social Media : 
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
                                sorry, no Social media provided
                            </a>
                        <?php 
                        }
                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ============== End personProfile =============== -->
    <?php 
        }
    } else {
        header("location:dashboard.php");
    }
    ?>
