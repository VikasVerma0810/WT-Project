<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 


  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  $managers = $conn->query("SELECT * FROM managers");
  $managers->execute();

  $allManagers = $managers->fetchAll(PDO::FETCH_OBJ);


?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Managers</h5>
             <a  href="<?php echo ADMINURL; ?>/managers/create-managers.php" class="btn btn-primary mb-4 text-center float-right">Create Manager</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Manager Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Show/Hide</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Login</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allManagers as $manager)  : ?>
                  <tr>
                    <th scope="row"><?php echo $manager->id; ?></th>
                    <td><?php echo $manager->name; ?></td>
                    <td><?php echo $manager->email; ?></td>
                    <td><a  href="./control-managers.php?id=<?php echo $manager->id; ?>&setter=<?php if($manager->listing){echo '0';} else{ echo '1';} ?>" class="btn btn-<?php if($manager->listing){echo 'success';} else{ echo 'warning';} ?> text-white text-center ">Update </a></td>
                    <td><a href="./delete-managers.php?id=<?php echo $manager->id; ?>" class="btn btn-danger  text-center ">Delete </a></td>
                    <td><a href="./login-managers.php?id=<?php echo $manager->id; ?>" class="btn btn-danger  text-center ">Login </a></td>
                  </tr>
                  <?php endforeach; ?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php"; ?>
