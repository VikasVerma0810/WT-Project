<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
  }

  $id = $_GET['id'];
    $select = $conn->query("SELECT * FROM gallery WHERE id='$id'");
    $select->execute();

    $category = $select->fetch(PDO::FETCH_OBJ);



    if(isset($_POST['submit'])) {

        if(empty($_POST['title']) OR empty($_POST['sdate'])  OR empty($_POST['location']) ) {
    
            echo "<script>alert('one or more inputs are empty')</script>";
    
        } 
        else {
                $title = $_POST['title'];
                $sdate = $_POST['sdate'];
                $location = $_POST['location'];
    
                $insert = $conn->prepare("UPDATE gallery SET heading = :title, time = :sdate, venue = :location WHERE id='$id'");
    
                $insert->execute([
                    ":title" => $title,
                    ":sdate" => $sdate,
                    ":location" => $location,
                ]);
    
                    echo "<script> window.location.href='".ADMINURL."/gallery/show-gallery.php'; </script>";
                    
            }
        }

?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline ">Upload Image</h5>
              <form method="POST" action="./update-gallery.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>Title</label>
                  <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" value="<?php echo $category->heading; ?>" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Venue</label>
                    <input type="text" name="location" id="form2Example1" class="form-control" placeholder="Venue" value="<?php echo $category->venue; ?>" />
                </div>

                <div class="form-group">
                    <label for="sdate">Starting Date</label>
                    <input type="date" name="sdate" class="form-control" id="sdate" value=<?php echo $category->time; ?>></input>
                </div>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
