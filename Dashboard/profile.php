<?php
    ob_start(); 
    session_start();
    $page_name = "Profile";
    $style = "profile.css";
    $script = "profile.js";
    $boot="true"; 
    require_once "init.php";
    $formType = $_GET['from'];
    if(isset($_SESSION['first_name'])){
      if ($_GET['from'] == "dashboard" && isset($_GET['id']) && is_numeric($_GET['id'])){
        $admin_id = $_GET['id'];
        $all_data = getData_with_id("hosters",$admin_id);
      }else if ($_GET['from'] == "hosters" && isset($_GET['id']) && is_numeric($_GET['id'])){
        $admin_id = $_GET['id'];
        $all_data = getData_with_id("hosters",$admin_id);
      }else if($_GET['from'] == "members" && isset($_GET['id']) && is_numeric($_GET['id'])){
        $member_id = $_GET['id'];
        $all_data = getData_with_id("members",$member_id);
      }
 
?>
<div class="container">
<a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php 
                      if($formType = "members"){?>
                        <img src="img/members/<?php echo $all_data["img"]?>" alt="Member" class="rounded-circle" width="120" height="120">
                    <?php
                      } else if($formType = "hosters" || $formType = "dashboard"){?>
                        <img src="img/hosters/<?php echo $all_data["photo"]?>" alt="Admin" class="rounded-circle" width="120" height="120">
                    <?php
                      }
                    ?>
                    <div class="mt-3">
                      <h4><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></h4>
                      <?php 
                        if($formType = "members"){?>
                          <p class="text-secondary mb-1">Member in <?php echo $all_data["commity"];?> Commity</p>
                          <p class="text-muted font-size-sm"><?php echo $all_data["university"] . " " . " University " . " , Egypt"; ?></p>
                          <p class="text-muted font-size-sm"><?php echo "Member From : " . $all_data["season"]; ?></p>
                      <?php
                        } else if($formType = "hosters" || $formType = "dashboard"){?>
                          <p class="text-secondary mb-1"><?php echo $all_data["position_name"];?> of <?php echo $all_data["commity_name"];?></p>
                          <p class="text-muted font-size-sm"><?php echo $all_data["university_name"] . " " . " University " . " , Egypt"; ?></p>
                          <p class="text-muted font-size-sm"><?php echo "Member From : " . $all_data["season_year"]; ?></p>
                      <?php
                        }
                      ?>
                      <a href="dashboard.php" style="color: #fff;text-decoration: none;" class="btn btn-primary">Go to Dashboard</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <?php 
                    if(!empty($all_data["facebook"])){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                      <span class="text-secondary"><a href="<?php echo $all_data["facebook"];?>" target="_blank"><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></a></span>
                    </li>
                  <?php
                    }
                  ?>
                  <?php 
                    if(!empty($all_data["twitter"])){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                      <span class="text-secondary"><a href="<?php echo $all_data["twitter"];?>" target="_blank"><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></a></span>
                    </li>
                  <?php
                    }
                  ?>
                  <?php 
                    if($formType = "members"){
                      if(!empty($all_data["insta"])){?>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                          <span class="text-secondary"><a href="<?php echo $all_data["insta"];?>" target="_blank"><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></a></span>
                        </li>
                      <?php
                        }
                    } else if($formType = "hosters" || $formType = "dashboard"){
                      if(!empty($all_data["instgram"])){?>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                          <span class="text-secondary"><a href="<?php echo $all_data["instgram"];?>" target="_blank"><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></a></span>
                        </li>
                      <?php
                        }
                    }?>
                  
                  <?php 
                    if(!empty($all_data["linked_in"])){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><svg style="color:#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"class="feather feather-globe mr-2 icon-inline"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>Linked In</h6>
                      <span class="text-secondary"><a href="<?php echo $all_data["linked_in"];?>" target="_blank"><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></a></span>
                    </li>
                  <?php
                    }
                  ?>                                    
                </ul>
              </div>
            </div>
            <div class="col-md-8">
            <div class="content">
                <div class="container">
                    <h3 class="content_heaader"><i class="fal fa-address-card"></i> More Information</h3>
                    <img style="display: block;margin:auto;margin-bottom:50px" src="img/line.png" alt="line">
                      <?php 
                        if($formType = "members"){ ?>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Name: <span style="color: #b51b43;"><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Commitee: <span style="color: #b51b43;"><?php echo $all_data["commity"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Birthday: <span style="color: #b51b43;"><?php echo $all_data["birthday"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Phone: <span style="color: #b51b43;"><?php echo $all_data["phone"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Email: <span style="color: #b51b43;"><?php echo $all_data["email"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Position Name: <span style="color: #b51b43;">Member</span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">University Name: <span style="color: #b51b43;"><?php echo $all_data["university"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">College Name: <span style="color: #b51b43;"><?php echo $all_data["collage_name"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">College Year: <span style="color: #b51b43;"><?php echo $all_data["collage_year"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">About Hoster: <span style="color: #b51b43;"><?php echo $all_data["about"]?></span></h2>
                        <?php
                        } else if($formType = "hosters" || $formType = "dashboard"){?>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Name: <span style="color: #b51b43;"><?php echo $all_data["first_name"] . " " . $all_data["last_name"];?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Commitee: <span style="color: #b51b43;"><?php echo $all_data["commity_name"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Birthday: <span style="color: #b51b43;"><?php echo $all_data["birthday"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Phone: <span style="color: #b51b43;"><?php echo $all_data["phone"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Email: <span style="color: #b51b43;"><?php echo $all_data["email"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">Position Name: <span style="color: #b51b43;"><?php echo $all_data["position_name"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">University Name: <span style="color: #b51b43;"><?php echo $all_data["university_name"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">College Name: <span style="color: #b51b43;"><?php echo $all_data["college_name"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">College Year: <span style="color: #b51b43;"><?php echo $all_data["college_year"]?></span></h2>
                          <h2 class="m-0 mb-2" style="color:#3d6581">About Hoster: <span style="color: #b51b43;"><?php echo $all_data["about_hoster"]?></span></h2>
                      <?php
                        }
                      ?>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
    </div>
    
<?php }else{
            header("location:index.php");}

            ob_end_flush();