<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  
  $orders = $conn->query("SELECT * FROM gallery");
  $orders->execute();

  $allOrders = $orders->fetchAll(PDO::FETCH_OBJ);


?>
    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
              <a  href="<?php echo ADMINURL; ?>/gallery/create-gallery.php" class="btn btn-primary mb-4 text-center float-right">Add Images</a>
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Time</th>
                    <th scope="col">Venue</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allOrders as $order) : ?>
                    <tr>
                      <th scope="row"><?php echo $order->id; ?></th>
                      <td><?php echo $order->heading; ?></td>
                      <td><?php echo $order->time; ?></td>
                      <td><?php echo $order->venue; ?></td>
                      <td><a  href="update-gallery.php?id=<?php echo $order->id; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                      <td><td><a href="delete-gallery.php?id=<?php echo $order->id; ?>" class="btn btn-danger text-center ">Delete</a></td></td>

                    </tr>
                  <?php endforeach; ?>
              
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



 <?php require "../layouts/footer.php"; ?>
