<?php 

  session_start();
  define("ADMINURL", "http://localhost/WT-Project/admin-panel");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <link href="<?php echo ADMINURL; ?>/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <?php if(isset($_SESSION['adminname']) || isset($_SESSION['managername'])) : ?>
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link text-white" style="margin-left: 20px;" href="<?php echo ADMINURL; ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if(isset($_SESSION['adminname'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="'.ADMINURL.'/admins/admins.php" style="margin-left: 20px;">Admins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo ADMINURL; ?>/managers/show-managers.php" style="margin-left: 20px;">Managers</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/resorts/show-resorts.php" style="margin-left: 20px;">Resorts</a>
          </li>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <?php if(!isset($_SESSION['adminname']) && !isset($_SESSION['managername'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/login-admins.php">login
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php  elseif (isset($_SESSION['adminname'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['adminname']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
              
          </li>
          <?php elseif (isset($_SESSION['managername'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['managername']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
              
          </li>
          <?php endif; ?>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">