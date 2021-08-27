<?php 
ob_start(); 
session_start();
$page_name = "Committee Members";
$style = "members.css";
$script = "members.js";
include "init.php";

if(isset($_SESSION['first_name'])){
   $committe = $_GET['committe'];
 
   $allCommittes = selectCommity();

  //  echo "<pre>";
  //  print_r($allCommittes);
  //  echo "</pre>";


  foreach($allCommittes as $committeData){
    $committeName[] = $committeData['name'];
  }

    if(in_array($committe,$committeName)){  
      // echo "Yes";
      $members_allData = getData_with_committee("members",$committe);

      // echo "<pre>";
      // print_r($members_data);
      // echo "</pre>";
      // $members_allData;
    } else {
      header('Location: dashboard.php');
    }
  // }

  //  if( $committe in_array($allCommittes['abbreviation'])){  
  //     echo "Yes";
  //  } else {
  //    echo "No";
  //  }

    // if($committe == "ER"){
    //     $members_data = getData_with_committee("members","ER");
    // }else if ($committe == "HR"){
    //     $members_data = getData_with_committee("members","HR");
    // }else if ($committe == "PM"){
    //     $members_data = getData_with_committee("members","PM");
    // }else if ($committe == "Media"){
    //     $members_data = getData_with_committee("members","Media");
    // }else if ($committe == "Logistics"){
    //     $members_data = getData_with_committee("members","Logistics");
    // }else if ($committe == "Presentation"){
    //     $members_data = getData_with_committee("members","Presentation");
    // }else if ($committe == "IT"){
    //     $members_data = getData_with_committee("members","IT");
    // }else{
    //     header("location:dashboard.php");
    // }

    $i = 1;
?>

<div class="content">
  <section class="content">
    <div class="container">
    <h2 class='text-center pt-5 pb-5'>Members of <?php echo $committe?> Committe</h2>
    <a class="btn btn-secondary pr-4 pl-4" href="dashboard.php">Back</a>
      <!-- /.row -->
      <?php 
        if(empty($members_allData)){?>
          <h2 class="alert alert-danger mt-5">Sorry, there are no data here</h2>
      <?php
        } else {
      ?>
        <div class="row">
          <div class="col-12">
            <div class="card mt-4">
              <div class="card-header">
                <h3 class="card-title">Members Table</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Collage</th>
                      <th>Collage Year</th>
                      <th>Social Media Link</th>
                      <th>View</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach($members_allData as $members_data_info){
                    ?>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><?php echo $i?></td>
                      <td>
                        <?php 
                          echo $members_data_info['first_name'] . " " . $members_data_info['last_name']
                        ?>
                      </td> 
                      <td><?php echo $members_data_info['email']?></td>
                      <td><?php echo $members_data_info['phone']?></td>
                      <td><?php echo $members_data_info['collage_name']?></td>
                      <td><?php echo $members_data_info['collage_year']?></td>
                      <td>
                        <div class='d-flex justify-content-between align-items-center pt-2 pb-2'>
                          <?php 
                            if(!empty($members_data_info['facebook'])){?>
                              <a style='font-size: 20px' href="<?php echo $members_data_info['facebook'] ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
                          <?php
                            } 
                          ?>
                          <?php 
                            if(!empty($members_data_info['twitter'])){?>
                              <a style='font-size: 20px' href="<?php echo $members_data_info['twitter'] ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
                          <?php
                            } 
                          ?>
                          <?php 
                            if(!empty($members_data_info['insta'])){?>
                              <a style='font-size: 20px' href="<?php echo $members_data_info['insta'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                          <?php
                            } 
                          ?>
                          <?php 
                            if(!empty($members_data_info['linked_in'])){?>
                              <a style='font-size: 20px' href="<?php echo $members_data_info['linked_in'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                          <?php
                            } 
                          ?>
                      </div>
                      </td>
                      <td>
                        <a href="profile.php?from=members&id=<?php echo  $members_data_info['id'];?>" class="edit_button btn btn-warning mr-3"> <i class="far fa-eye"></i></a>
                      </td>
                      <td>
                        <a href="update_member.php?id=<?php echo  $members_data_info['id'];?>" class="edit_button btn btn-primary mr-3"> <i class="far fa-edit ml-1"></i></a>
                      </td>
                      <td>
                        <a href="delete.php?from=members&id=<?php echo  $members_data_info['id'];?>" class="btn btn-danger delete_button"><i class="far fa-trash-alt ml-1"></i></a>
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
        <?php
      } 
      ?>
    </div>
  </section>
</div>

<?php

}

else{
    header("location:index.php");
}
ob_end_flush();