<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }


  //fetching categories 
  $id = $_GET['id'];

  $categories = $conn->query("SELECT * FROM timeline where id='$id'");
  $categories->execute();

  $allCategories = $categories->fetch(PDO::FETCH_OBJ);

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

            $insert = $conn->prepare("UPDATE timeline SET heading = :title, startDate = :sdate, description = :description, endDate = :exp_date, link = :link WHERE id='$id'");

            $insert->execute([
                ":title" => $title,
                ":sdate" => $sdate,
                ":description" => $description,
                ":link" => $link,
                ":exp_date" => $exp_date,
            ]);

              echo "<script> window.location.href='".ADMINURL."/timeline/show-timeline.php'; </script>";


    }
  }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Add timeline</h5>
              <form method="POST" action="./update-timeline.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>Title</label>
                  <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" value="<?php echo $allCategories->heading ; ?>" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Link</label>
                    <input type="text" name="link" id="form2Example1" class="form-control" placeholder="link" value="<?php echo $allCategories->link ; ?>" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $allCategories->description ; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="sdate">Starting Date</label>
                    <input type="date" name="sdate" class="form-control" id="sdate" value=<?php echo $allCategories->startDate ; ?>></input>
                </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Expiration Date</label>
                  <input type="date" name="exp_date" class="form-control" id="exampleFormControlSelect1" value=<?php echo $allCategories->endDate ; ?>></input>
              </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
