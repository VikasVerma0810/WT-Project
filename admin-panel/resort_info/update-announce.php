<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }

  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $select = $conn->query("SELECT * FROM announce WHERE id='$id'");
    $select->execute();

    $category = $select->fetch(PDO::FETCH_OBJ);


    if(isset($_POST['submit'])) {

      if(empty($_POST['name']) OR empty($_POST['link'])
      OR empty($_POST['description'])) {
  
          echo "<script>alert('one or more inputs are empty')</script>";
  
      } else {
  
         
  
              $name = $_POST['name'];
              $link = $_POST['link'];
              $description = $_POST['description'];
             
  
             
              $insert = $conn->prepare("UPDATE announce SET heading = :name, link = :link, description = :description WHERE id='$id'");
  
              $insert->execute([
                  ":name" => $name,
                  ":link" => $link,
                  ":description" => $description,
                 
              ]);
  
              echo "<script> window.location.href='".ADMINURL."/announcements/show-announce.php'; </script>";

  
  
      }
    }


  }




?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Announcement</h5>
              <form method="POST" action="update-announce.php?id=<?php echo $id; ?>">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label for="name"><strong>Title</strong></label>
                  <input type="text" name="name" id="form2Example1" value="<?php echo $category->heading; ?>" class="form-control" placeholder="name" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <label for="name"><strong>Link</strong></label>
                  <input type="text" name="link" id="form2Example1" value="<?php echo $category->link; ?>" class="form-control" placeholder="link" />      
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1"><strong>Description</strong></label>
                  <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                  <?php echo $category->description; ?>
                  </textarea>
                </div>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
