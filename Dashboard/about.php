<?php 
ob_start(); 
session_start();
$page_name = "About US";
$style = "members.css";
$script = "";
include "init.php";
if(isset($_SESSION['first_name'])){ 
    $members_data = getAllData("about_us");
    $i = 1;
?>
<div class="content">
  <section class="content">
    <div class="container">
    <a class="btn btn-secondary pr-4 pl-4 mb-2 mt-5" href="dashboard.php">Back</a>
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card mt-4">
            <div class="card-header">
              <h3 class="card-title">About US Table</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
              <div class="hosters_options mb-2">
                <!-- <a href="add_member.php" class="btn btn-info">Add <i class="fas fa-user-plus ml-1"></i></a> -->
              </div>
              <table class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Section Name</th>
                    <th>Section Content</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($members_data as $members_data_info){
                  ?>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td><?php echo $i?></td>
                    <td>
                      <?php 
                        echo $members_data_info['section_name'] 
                      ?>
                    </td> 
                    <td><?php echo $members_data_info['content']?></td>
                    <td>
                      <a href="update_about.php?id=<?php echo $members_data_info['id'];?>" class="edit_button btn btn-primary mr-3"> <i class="far fa-edit ml-1"></i></a>
                    </td>
                    
                  </tr>
                  <?php 
                      $i++;
                    }
                  ?>
                </tbody>
              </table>
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

}

else{
    header("location:signin.php");
}
ob_end_flush();