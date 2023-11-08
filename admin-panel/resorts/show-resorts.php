<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

  if(!isset($_SESSION['adminname']) && !isset($_SESSION['managername'])) {
    
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  
  if (isset($_SESSION['managername'])) {
    $mid = $_SESSION['manager_id'];
    $resorts = $conn->query("SELECT * FROM resortinfo where mid=$mid");
  }
  else{
    $resorts = $conn->query("SELECT * FROM resortinfo");
  }
  $resorts->execute();

  $allResorts = $resorts->fetchAll(PDO::FETCH_OBJ);


?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">All Resorts</h5>
              <?php if(isset($_SESSION['managername'])) : ?>
             <a  href="<?php echo ADMINURL; ?>/resorts/create-resorts.php" class="btn btn-primary mb-4 text-center float-right">Add Resort</a>
             <?php endif; ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Resort Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Price</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Show/hide</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Bookings</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allResorts as $resort) : ?>
                    <tr>
                      <td><?php echo  $resort->Name; ?></td>
                      <td><?php echo  $resort->location; ?></td>
                      <th scope="row"><?php echo  $resort->price; ?></th>
                      <th><?php echo  $resort->contact_info; ?></th>
                      <td><a  href="./control-resorts.php?id=<?php echo $resort->id; ?>&setter=<?php if($resort->listing){echo '0';} else{ echo '1';} ?>" class="btn btn-<?php if($resort->listing){echo 'success';} else{ echo 'warning';} ?> text-white text-center ">Show/hide</a></td>
                      <td><a  href="update-resorts.php?id=<?php echo $resort->id; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                      <td><a href="delete-resorts.php?id=<?php echo $resort->id; ?>" class="btn btn-danger text-center ">Delete </a></td>
                      <td><a href="show-bookings.php?id=<?php echo $resort->id; ?>" class="btn btn-secondary text-center ">Bookings </a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


 <?php require "../layouts/footer.php"; ?>
