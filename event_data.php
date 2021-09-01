<!-- ============== Start header =============== -->
<?php 
    $pageTitle = "Enactus Events";
    $pageStyle = "events.css";
    $pageActive = "events";
       
    include "init.php";
    if (isset($_GET['event']) && is_numeric($_GET['event'])){
        $event_id = $_GET['event'];
        $eventData = getData_with_id("event",$event_id);
?>
<!-- ============== End header =============== -->
    <!-- ============== Start go_up icon =============== -->
    <i class="fas fa-angle-double-up go_up"><a href="#"></a></i>
    <!-- ============== End go_up icon =============== -->
    <!-- ============== Start pageHeader =============== -->
    <div class="pageHeader">
        <div class="container">
            <div class="pageHeaderHeader">
                <h2>Events</h2>
                <h3><a href="index.html">Home </a><i class="fas fa-chevron-right"></i><a href="events.html"> Events</a></h3>
            </div>
        </div>
    </div>
    <!-- ============== End pageHeader =============== -->
    <!-- ============== Start eventDescription =============== -->
    <div class="eventDescription">
        <div class="container">
            <h2 class="eventSectionHeader text-center">Enactus Banha Events</h2>
            <div class="eventData"> <!-- ######### Start Event ######### -->
                <h2 class="eventHeader text-center"><?php echo $eventData['e_name']?></h2>
                <div class="eventInfo">
                    <h2>Description :</h2>
                    <p><?php echo $eventData['descrip']?></p>
                </div>
                <div class="eventLocation">
                    <h2>Location : <span><?php echo $eventData['e_location']?></span></h2>
                </div>
                <div class="eventDate">
                    <h2>Season : <span><?php echo $eventData['e_season']?></span></h2>
                </div>
                <div class="eventSpeakers">
                    <h2>Speakers : </h2>
                    <div class="d-flex speakersLinks flex-wrap">
                    <?php
                        for($i=1; $i<=10; $i++){    
                            if($eventData['speaker_' . $i ."_link"] == null){?>
                        <?php
                            } else {?>
                            <a href="<?php echo $eventData['speaker_' . $i . '_link'] ?>" target="_blank"><?php echo $eventData['speaker_' . $i] ?></a> 
                        <?php
                            }
                        }   
                    ?>
                    </div>
                </div>
                <div class="eventImgs">
                    <h2>Event Images : </h2>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start">                    
                        <?php 
                            if($eventData['main_img'] == null){?>
                            <div class="imgContainer col-12 col-md-6 col-lg-4">
                                <a id="single_image" href="Dashboard/img/events/default.jpg">
                                    <img src="Dashboard/img/events/default.jpg" alt="">
                                </a>
                            </div>
                        <?php
                            } else {?>
                                <div class="imgContainer col-12 col-md-6 col-lg-4">
                                    <a id="single_image" href="Dashboard/img/events/<?php echo $eventData['main_img']?>">
                                        <img src="Dashboard/img/events/<?php echo $eventData['main_img']?>" alt="">
                                    </a>
                                </div>
                        <?php
                            }
                        ?>
                        <?php 
                        for($i=1; $i<=4; $i++){
                            if($eventData['img_' . $i] == null){?>                            <?php
                                } else {?>
                                    <div class="imgContainer col-12 col-md-6 col-lg-4">
                                        <a id="single_image" href="Dashboard/img/events/<?php echo $eventData['img_' . $i]?>">
                                            <img src="Dashboard/img/events/<?php echo $eventData['img_' . $i]?>" alt="">
                                        </a>
                                    </div>
                            <?php
                                }
                        } ?>  
                        <?php 
                            if($eventData['imgs_link'] == null){?>
                            <div class="imgContainer col-12 col-md-6 col-lg-4">
                                <a class="driveLink d-flex flex-column align-items-center justify-content-center text-center" style='background: red;'>
                                    <i class="fas fa-times"></i>
                                    <h2>No images Link</h2>
                                </a>
                            </div>
                        <?php
                            } else {?>
                                <div class="imgContainer col-12 col-md-6 col-lg-4">
                                    <a class="driveLink d-flex flex-column align-items-center justify-content-center text-center" href="<?php echo $eventData['imgs_link']?>" target="_blank">
                                        <i class="fab fa-google-drive"></i>
                                        <h2>More Images for the event</h2>
                                    </a>
                                </div>
                        <?php
                            }
                        ?>
                    
                        <!-- <div class="imgContainer col-12 col-md-6 col-lg-4">
                            <a id="single_image" href="images/gallary/alex1.jpg">
                                <img src="images/gallary/alex1.jpg" alt="">
                            </a>
                        </div>
                        <div class="imgContainer col-12 col-md-6 col-lg-4">
                            <a id="single_image" href="images/gallary/alex1.jpg">
                                <img src="images/gallary/alex1.jpg" alt="">
                            </a>
                        </div>
                        <div class="imgContainer col-12 col-md-6 col-lg-4">
                            <a id="single_image" href="images/gallary/alex1.jpg">
                                <img src="images/gallary/alex1.jpg" alt="">
                            </a>
                        </div>
                        <div class="imgContainer col-12 col-md-6 col-lg-4">
                            <a id="single_image" href="images/gallary/alex1.jpg">
                                <img src="images/gallary/alex1.jpg" alt="">
                            </a>
                        </div>

                        <div class="imgContainer col-12 col-md-6 col-lg-4">
                            <a class="driveLink d-flex flex-column align-items-center justify-content-center text-center" href="images/gallary/general (4).jpg">
                                <i class="fab fa-google-drive"></i>
                                <h2>More Images for the event</h2>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- ============== End eventDescription =============== -->
<!-- ============== Start footer =============== -->
<?php 
    include $tempPath . "footer.php";
} else {
    header("location:dashboard.php");
}
?>
<!-- ============== End footer =============== -->
