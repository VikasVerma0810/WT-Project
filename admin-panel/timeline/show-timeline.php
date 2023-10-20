<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  
  $products = $conn->query("SELECT * FROM timeline");
  $products->execute();

  $allProducts = $products->fetchAll(PDO::FETCH_OBJ);


?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
              <a  href="<?php echo ADMINURL; ?>/timeline/create-timeline.php" class="btn btn-primary mb-4 text-center float-right">Add timeline</a>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Start date </th>
                    <th scope="col">End date</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($allProducts as $product) : ?> 
                    <tr>
                      <th scope="row"><?php echo $product->id; ?></th>
                      <td><?php echo $product->heading; ?></td>
                      <td><?php echo $product->startDate; ?></td>
                      <td><?php echo $product->endDate; ?></td>
                      <td><a  href="update-timeline.php?id=<?php echo $product->id; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                      <td><a href="delete-timeline.php?id=<?php echo $product->id; ?>" class="btn btn-danger text-center ">Delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php"; ?>
