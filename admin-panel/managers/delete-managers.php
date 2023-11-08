<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

    if(!isset($_SESSION['adminname'])) {
            
        echo "<script> window.location.href='".ADMINURL."/managers/show-managers.php'; </script>";

    }

    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $delete = $conn->query("DELETE FROM managers WHERE id='$id'");
        $delete->execute(); 

        echo "<script> window.location.href='".ADMINURL."/managers/show-managers.php'; </script>";

    }