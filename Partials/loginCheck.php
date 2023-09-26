<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['cPass'])){
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $cpassword = $_POST['cPass'];
            if ($password == $cpassword) {    
                $search = "Select * from log_details where email = '$email'";
                $result = mysqli_query($conn, $search);
                $num = mysqli_num_rows($result);
                if ($num != 0) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Account with this email already exist.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else {
                    $hash = password_hash("$password", PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `log_details` (`email`, `password`) VALUES ('$email', '$hash')";
                    mysqli_query($conn, $sql);
                    header("location: login.php");
                }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Password does not match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $sql = "Select * from log_details where email = '$email'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    session_start();
                    if ($email == 'vikas@gmail.com') {
                        $_SESSION['admin'] = true;
                    }
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    header("location: ./index.php");
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> Wrong password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> No such user exists.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
?>