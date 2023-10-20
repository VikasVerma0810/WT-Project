<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


  if(!isset($_SESSION['adminname'])) {
        
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }

  //products
  $resortinfo = $conn->query("SELECT COUNT(*) as resortinfo_num FROM resortinfo");
  $resortinfo->execute();

  $num_resortinfo = $resortinfo->fetch(PDO::FETCH_OBJ);

  //orders
  // $resort_info = $conn->query("SELECT COUNT(*) as resort_num FROM resort_info");
  // $resort_info->execute();

  // $num_resort_info = $resort_info->fetch(PDO::FETCH_OBJ);

  //categories
  // $gallery = $conn->query("SELECT COUNT(*) as gallery_num FROM gallery");
  // $gallery->execute();

  // $num_gallery = $gallery->fetch(PDO::FETCH_OBJ);

  //admins
  $admins = $conn->query("SELECT COUNT(*) as admins_num FROM admin");
  $admins->execute();

  $num_admins = $admins->fetch(PDO::FETCH_OBJ);
?>
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Resorts</h5>
              <p class="card-text">number of timeline: <?php echo $num_resortinfo->resortinfo_num; ?></p>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Announcements</h5>
              <p class="card-text">number of announcements: <?php echo $num_announce->announce_num; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Gallery</h5>
              <p class="card-text">Gallery images: <?php echo  $num_gallery->gallery_num; ?></p>
            </div>
          </div>
        </div> -->
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              <p class="card-text">number of admins: <?php echo $num_admins->admins_num; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require "layouts/footer.php"; ?>
