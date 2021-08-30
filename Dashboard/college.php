<?php

ob_start(); 
session_start();
$page_name = "Enactus Events";
$style = "messages.css";
$script = "";
include "init.php";

if(isset($_SESSION['first_name'])) 
{
    $collages_data = getAllData("collage");
    $i = 1;
  ?> 

<div class="content"> 
  <section class="content">
    <div class="container">
    <a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
      <!-- /.row -->
      <div class="row justify-content-center">
        <div class="col-9">
          <div class="card mt-4">
            <div class="card-header">
              <h3 class="card-title">Colleges Table</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
              <div class="hosters_options mb-2">
                <a href="college_operations.php?operation=add" class="btn btn-info">Add <i class="far fa-calendar-plus"></i></a>
              </div>

        <div class="row mt-5">
            <?php foreach ($collages_data as $collage_data){ ?>
            <div class="col-md-6">
                <div class="ui cards mb-3 text-center">
                    <div class="card">
                        <div class="content">
                            <img style="margin: 20px 0;width:30%" src="img/book_Gif.gif" alt="sender">
                            <div class="header pb-3">
                                <?php echo $collage_data["name"];?>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <a class="ui basic blue button" style="text-decoration: none !important;color:#17A2B8!important" href="college_operations.php?operation=edit&id=<?php echo $collage_data["id"]?>">Edit</a>
                            </div>
                        </div>
                    </div>  
                </div>      
            </div>
            <?php } ?>
        </div>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>

<?php
} else {
    header("location:dashboard.php");
}
ob_end_flush();