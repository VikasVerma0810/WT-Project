<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

    if(!isset($_SESSION['adminname'])) {
            
        echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

    }

    if(isset($_GET['id'])) {

        $id = $_GET['id'];


        $select = $conn->query("SELECT * FROM announce WHERE id='$id'");
        $select->execute();

        $data = $select->fetch(PDO::FETCH_OBJ);

        unlink("img_category/".$data->image);

        $delete = $conn->query("DELETE FROM announce WHERE id='$id'");
        $delete->execute(); 

        echo "<script> window.location.href='".ADMINURL."/announcements/show-announce.php'; </script>";

    }