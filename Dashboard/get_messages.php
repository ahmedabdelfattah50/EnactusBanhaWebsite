<?php
    ob_start(); 
    session_start();
    $page_name = "Get All Message";
    $style = "messages.css";
    $script = "";
    require_once "init.php";
    if(isset($_SESSION['first_name'])){?>
    
    <div class="container mb-3">
    <a class="btn btn-secondary pr-4 pl-4 mb-2 mt-5" href="dashboard.php">Back</a>
        <img style="display: block;margin: auto;margin-top:0px;margin-bottom:20px" class="add_admin" src="img/icons8-unread-messages-48.png" alt="add_admin">
        <h3 class="text-center mt-2 mb-3">Welcome To Website Dashboard .</h3>
        <p class="text-center">From This Page You Can Show All Messages</p>

        <?php $allData = getAllData("contact");?>
<div class="row mt-5">
        <?php foreach ($allData as $all_messages){ ?>
<div class="col-md-6">
            <div class="ui cards mb-3 text-center">
                <div class="card">
                    <div class="content">
                    <img style="margin: 20px 0;width:30%" src="img/check.gif" alt="sender">
                    <div class="header pb-3">
                        <?php echo $all_messages["name"];?>
                    </div>
                    <div class="meta">
                    <?php echo $all_messages["email"];?>
                    </div>
                    <div class="description pb-3">
                    <?php echo $all_messages["messsage"];?>
                    </div>
                    <div class="meta">
                    <?php echo $all_messages["time"];?>
                    </div>
                    </div>
                    <div class="extra content">
                    <div class="ui two buttons">
                       <a class="ui basic red button" style="text-decoration: none !important;color:#db2828!important" href="delete.php?id=<?php echo $all_messages["id"]?>&from=messages"> Delete </a>
                    </div>
                    </div>
                    </div>
                </div>
        </div>
        <?php } ?>
        </div>

            <?php if (count_users("id","contact") == 0){?>
                <p style="margin-top: 100px;font-weight: 700;font-size: 30px;" class="text-danger text-center">* There is No Message To Show *</p>
            <?php } ?>

    </div>

    <?php }else{
        header("location:signin.php");
    }
    ob_end_flush();