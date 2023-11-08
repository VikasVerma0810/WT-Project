<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

  if(!isset($_SESSION['adminname']) && !isset($_SESSION['managername'])) {
    
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }

  $rid = $_GET['id'];
  
  if (isset($_SESSION['managername'])) {
    $mid = $_SESSION['manager_id'];
    $resorts = $conn->query("SELECT * FROM booking where rid=$rid");
    $num = $resorts->rowCount();
    if (!$num) {
        echo "<script>alert('No booking found')</script>";
        echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
    }
  }
  else{
    $resorts = $conn->query("SELECT * FROM booking where rid=$rid");
    $num = $resorts->rowCount();
    if (!$num) {
        echo "<script>alert('No booking found')</script>";
        echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
      }
  }
  $resorts->execute();

  $allResorts = $resorts->fetchAll(PDO::FETCH_OBJ);


?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">All Bookings</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Booker Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Number of Persons</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allResorts as $resort) : ?>
                    <tr>
                      <td><?php echo  $resort->name; ?></td>
                      <td><?php echo  $resort->mobile; ?></td>
                      <td><?php echo  $resort->count; ?></td>
                      <td><?php echo  $resort->checkIn; ?></td>
                      <td><?php echo  $resort->checkOut; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


 <?php require "../layouts/footer.php"; ?>
