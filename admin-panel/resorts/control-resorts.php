<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

    if(!isset($_SESSION['adminname']) && !isset($_SESSION['managername'])) {
            
        echo "<script> window.location.href='".ADMINURL."/managers/show-managers.php'; </script>";

    }

    if(isset($_GET['id']) && isset($_GET['setter'])) {

        $id = $_GET['id'];
        $setter = $_GET['setter'];

        $delete = $conn->query("UPDATE resortinfo SET listing='$setter' WHERE id='$id'");
        $delete->execute(); 
        echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
        
    }
    echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";