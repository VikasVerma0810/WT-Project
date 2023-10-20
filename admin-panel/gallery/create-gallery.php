<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }


    if(isset($_POST['submit'])) {

        if(empty($_POST['title']) OR empty($_POST['sdate'])  OR empty($_POST['location']) ) {
    
            echo "<script>alert('one or more inputs are empty')</script>";
    
        } 
        else {
                $title = $_POST['title'];
                $sdate = $_POST['sdate'];
                $location = $_POST['location'];
                $image = $_FILES['image']['name'];
    
                $dir = "img_gallery/" . basename($image);
    
                $insert = $conn->prepare("INSERT INTO gallery(heading, time, venue, image)
                VALUES(:title, :sdate, :location, :image)");
    
                $insert->execute([
                    ":title" => $title,
                    ":sdate" => $sdate,
                    ":location" => $location,
                    ":image" => 'http://localhost/FitnessFestive/admin-panel/gallery/img_gallery/'.$image,
                ]);
    
                if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
                    echo "<script> window.location.href='".ADMINURL."/gallery/show-gallery.php'; </script>";
                    
                }
            }
        }
  
?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline ">Upload Image</h5>
              <form method="POST" action="./create-gallery.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>Title</label>
                  <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Venue</label>
                    <input type="text" name="location" id="form2Example1" class="form-control" placeholder="Venue" />
                </div>

                <div class="form-group">
                    <label for="sdate">Starting Date</label>
                    <input type="date" name="sdate" class="form-control" id="sdate"></input>
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
