<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

    if(!isset($_SESSION['adminname']) && !isset($_SESSION['managername'])) {
            
        echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

    }

    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        if ($_SESSION['managername']) {
            $mid = $_SESSION['manager_id'];
            $select = $conn->query("SELECT * FROM resortinfo where id=$id and mid=$mid");
            $num = $resorts->rowCount();
            if (!$num) {
                echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
            }
        }
        else{
            $select = $conn->query("SELECT * FROM resortinfo where id=$id");
            $num = $resorts->rowCount();
            if (!$num) {
                echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
            }
        }

        $select->execute();

        $data = $select->fetch(PDO::FETCH_OBJ);

        $directoryToDelete = $data->Name;

        $directoryToDelete = str_replace(" ", "", $directoryToDelete);
        $directoryToDelete = "gallery/$directoryToDelete";

        function deleteDirectory($dir) {
            if (is_dir($dir)) {
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file != "." && $file != "..") {
                        $filePath = $dir . DIRECTORY_SEPARATOR . $file;
                        if (is_dir($filePath)) {
                            deleteDirectory($filePath); // Recursively delete subdirectories
                        } else {
                            unlink($filePath); // Delete files
                        }
                    }
                }
                rmdir($dir); // Remove the empty directory
            }
        }

        if (is_dir($directoryToDelete)) {
            echo '<script>alert("Should it be deleted")</script>';
            deleteDirectory($directoryToDelete);
        }
        else{
            echo '<script>alert("No directory found")</script>';
        }

        $delete = $conn->query("DELETE FROM resortinfo WHERE id='$id'");
        $delete->execute(); 

        echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";

    }