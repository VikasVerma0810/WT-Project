<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }


  //fetching categories 

  $categories = $conn->query("SELECT * FROM gallery");
  $categories->execute();

  $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

  if(isset($_POST['submit'])) {

    if(empty($_POST['title']) OR empty($_POST['link'])  OR empty($_POST['description'])
    OR empty($_POST['sdate']) OR empty($_POST['exp_date'])) {

        echo "<script>alert('one or more inputs are empty')</script>";

    } else {

       

            $title = $_POST['title'];
            $sdate = $_POST['sdate'];
            $link = $_POST['link'];
            $description = $_POST['description'];
            $link = $_POST['link'];
            $exp_date = $_POST['exp_date'];
            $image = $_FILES['image']['name'];

            $dir = "img_timeline/" . basename($image);

            $insert = $conn->prepare("INSERT INTO timeline(heading, startDate, description, endDate, link, image)
            VALUES(:title, :sdate, :description, :exp_date, :link, :image)");

            $insert->execute([
                ":title" => $title,
                ":sdate" => $sdate,
                ":description" => $description,
                ":link" => $link,
                ":exp_date" => $exp_date,
                ":image" => 'http://localhost/FitnessFestive/admin-panel/timeline/img_timeline/'.$image,
            ]);

            if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
              echo "<script> window.location.href='".ADMINURL."/timeline/show-timeline.php'; </script>";

            }


    }
  }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Add timeline</h5>
              <form method="POST" action="create-timeline.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>Title</label>

                  <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Link</label>
                    <input type="text" name="link" id="form2Example1" class="form-control" placeholder="link" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="sdate">Starting Date</label>
                    <input type="date" name="sdate" class="form-control" id="sdate"></input>
                </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Expiration Date</label>
                  <input type="date" name="exp_date" class="form-control" id="exampleFormControlSelect1"></input>
              </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label>

                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>

               
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
