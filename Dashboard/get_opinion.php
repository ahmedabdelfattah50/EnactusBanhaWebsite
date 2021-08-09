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

        <?php $allData = getAllData("opinion");?>
            <div class="row mt-5">
        <?php foreach ($allData as $all_opinion){ ?>
            <div class="col-md-6">
            <div class="ui cards mb-3 text-center">
                <div class="card">
                    <div class="content">
                    <img style="margin: 20px 0;width:30%" src="img/testimonial.gif" alt="testimonial">
                    <div class="header pb-3">
                        <?php echo $all_opinion["name"];?>
                        <span style="font-size: 9px;" class="meta">
                    <?php echo $all_opinion["season"];?>
                    </span>
                    </div>
                    <div class="meta">
                    <?php echo $all_opinion["email"];?>
                    </div>
                    <div class="description pb-3">
                    <?php echo $all_opinion["opinion"];?>
                    </div>
                    <div class="meta">
                    <?php echo "Submit Time :" . $all_opinion["time"];?>
                    </div>

                    <div class="meta pt-2">
                    <?php echo "Current Season : " . $all_opinion["current_season"];?>
                    </div>

                    </div>
                    <div class="extra content">
                    <div class="ui two buttons">
                       <a class="ui basic red button" style="text-decoration: none !important;color:#db2828!important" href="delete.php?id=<?php echo $all_opinion["id"]?>&from=opinion"> Delete </a>
                    </div>
                    </div>
                    </div>
                </div>
        </div>
        <?php } ?>
        </div>

            <?php if (count_users("id","contact") == 0){?>
                <p style="margin-top: 100px;font-weight: 700;font-size: 30px;" class="text-danger text-center">* There is No Opnion To Show *</p>
            <?php } ?>

    </div>

    <?php }else{
        header("location:signin.php");
    }
    ob_end_flush();