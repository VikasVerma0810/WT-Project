<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


  if(!isset($_SESSION['adminname']) && !isset($_SESSION['managername'])) {
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }

  //resorts
  $resortinfo = $conn->query("SELECT COUNT(*) as resortinfo_num FROM resortinfo");
  if (isset($_SESSION['managername'])) {
    $mid = $_SESSION['manager_id'];
    $resortinfo = $conn->query("SELECT COUNT(*) as resortinfo_num FROM resortinfo where mid=$mid");
  }
  $resortinfo->execute();

  $num_resortinfo = $resortinfo->fetch(PDO::FETCH_OBJ);


  //managers
  $managersinfo = $conn->query("SELECT COUNT(*) as managersinfo_num FROM managers");
  $managersinfo->execute();

  $num_managersinfo = $managersinfo->fetch(PDO::FETCH_OBJ);

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

        <?php if(isset($_SESSION['adminname'])) : ?>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Managers</h5>
              <p class="card-text">number of timeline: <?php echo $num_managersinfo->managersinfo_num; ?></p>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              <p class="card-text">number of admins: <?php echo $num_admins->admins_num; ?></p>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
<?php require "layouts/footer.php"; ?>
