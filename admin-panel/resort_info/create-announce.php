<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }

  if(isset($_POST['submit'])) {

    if(empty($_POST['name']) OR empty($_POST['link'])
    OR empty($_POST['description'])) {

        echo "<script>alert('one or more inputs are empty')</script>";

    } else {

       

            $name = $_POST['name'];
            $link = $_POST['link'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];

            $dir = "img_category/" . basename($image);

            $insert = $conn->prepare("INSERT INTO announce(heading, link, description, image)
            VALUES(:name, :link, :description, :image)");

            $insert->execute([
                ":name" => $name,
                ":link" => $link,
                ":description" => $description,
                ":image" => 'http://localhost/FitnessFestive/admin-panel/announcements/img_category/'.$image,
            ]);

            if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
              echo "<script> window.location.href='".ADMINURL."/announcements/show-announce.php'; </script>";

            }


    }
  }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Make Announcement</h5>
              <form method="POST" action="create-announce.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="link" id="form2Example1" class="form-control" placeholder="link" />      
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-outline mb-4 mt-4">
                  <label>Image</label>

                  <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
