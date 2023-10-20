<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  
  $categories = $conn->query("SELECT * FROM announce");
  $categories->execute();

  $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);


?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="<?php echo ADMINURL; ?>/announcements/create-announce.php" class="btn btn-primary mb-4 text-center float-right">Make Announcement</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allCategories as $category) : ?>
                    <tr>
                      <th scope="row"><?php echo  $category->id; ?></th>
                      <td><?php echo  $category->heading; ?></td>
                      <td><?php echo  $category->description; ?></td>
                      <td><a  href="update-announce.php?id=<?php echo $category->id; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                      <td><a href="delete-announce.php?id=<?php echo $category->id; ?>" class="btn btn-danger  text-center ">Delete </a></td>
                    </tr>
                  <?php endforeach; ?>
               
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


 <?php require "../layouts/footer.php"; ?>
