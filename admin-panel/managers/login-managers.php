<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 


  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  else{

    // session_start();
    session_unset();
    session_destroy();
    session_start();
    $id = $_GET['id'];
    $managers = $conn->query("SELECT * FROM managers where id=$id");
    $managers->execute();
    
    $fetch = $managers->fetch(PDO::FETCH_OBJ);

    $_SESSION['managername'] = $fetch->name;
    $_SESSION['email'] = $fetch->email;
    $_SESSION['manager_id'] = $fetch->id;
    $_SESSION['manager'] = true;
    echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";

  }


?>