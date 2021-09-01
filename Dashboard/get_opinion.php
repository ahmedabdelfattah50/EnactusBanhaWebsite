<?php
    ob_start(); 
    session_start();
    $page_name = "Get All Opinions";
    $style = "messages.css";
    $script = ""; 
    require_once "init.php";
    if(isset($_SESSION['first_name'])){?>
    
    <div class="container mb-3">
    <a class="btn btn-secondary pr-4 pl-4 mb-2 mt-5" href="dashboard.php">Back</a>
        <img style="display: block;margin: auto;margin-top:0px;margin-bottom:20px" class="add_admin" src="img/icons8-unread-messages-48.png" alt="add_admin">
        <h3 class="text-center mt-2 mb-3">Welcome To Website Dashboard .</h3>
        <p class="text-center">From This Page You Can Show Members Opinion</p>

        <a href="opinion_operations.php?operation=add" class="btn btn-info">Add New Opinion <i class="fas fa-gavel"></i></i></a>
    
        <?php $allData = getAllData("opinion");?>
            <div class="row mt-5">
        <?php
        if(empty($allData)){?>
        <div class="container">
          <h2 class="alert alert-danger mt-5">Sorry, there are no data here</h2>
        </div>
        <?php
        } else {
        ?>
        <?php foreach ($allData as $all_opinion){ ?>
            <div class="col-md-6">
            <div class="ui cards mb-3 text-center">
                <div class="card">
                    <div class="content">
                    <?php 
                        if(empty($all_opinion["photo"])){ ?>
                            <img style="margin: 20px 0;width:30%" src="img/opinions/default.jpg
                            " alt="testimonial">
                    <?php
                        } else { ?>
                            <img style="margin: 20px 0;width:30%" src="img/opinions/<?php echo $all_opinion["photo"] ?>" alt="testimonial">
                    <?php 
                        }
                    ?>
                    <div class="header pb-3">
                        <?php echo $all_opinion["opinion"];?>
                        <span style="font-size: 9px;" class="meta">
                        <!-- <php echo "Name : " . $all_opinion["first_name"] ." " . $all_opinion["first_name"]?> -->
                    </span>
                    </div>
                    <div class="description">
                        <?php echo "Name : " . $all_opinion["first_name"] ." " . $all_opinion["first_name"]?>
                    </div>
                    <div class="description pb-3">
                        <?php echo "Email : " . $all_opinion["email"];?>
                    </div>
                    <div class="meta">
                    <?php echo "Commity	 :" . $all_opinion["commity"];?>
                    </div>

                    <div class="meta pt-2">
                    <?php echo "Position : " . $all_opinion["position"];?>
                    </div>

                    </div>
                    <div class="extra content">
                    <div class="ui two buttons">
                       <a class="ui basic blue button" style="text-decoration: none !important;color:#17A2B8!important" href="opinion_operations.php?operation=edit&id=<?php echo $all_opinion["id"]?>"> Edit </a>
                       <a class="ui basic red button" style="text-decoration: none !important;color:#db2828!important" href="delete.php?id=<?php echo $all_opinion["id"]?>&from=opinion"> Delete </a>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>

            <?php if (count_users("id","contact") == 0){?>
                <p style="margin-top: 100px;font-weight: 700;font-size: 30px;" class="text-danger text-center">* There is No Opnion To Show *</p>
            <?php } ?>

    </div>

    <?php }else{
        header("location:signin.php");
    }
    ob_end_flush();