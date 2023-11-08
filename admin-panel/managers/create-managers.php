<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 


  if(!isset($_SESSION['adminname'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  if(isset($_POST['submit'])) {

    if(empty($_POST['email']) OR empty($_POST['password'])
    OR empty($_POST['managername'])) {

        echo "<script>alert('one or more inputs are empty')</script>";

    } else {

       

            $email = $_POST['email'];
            $password = $_POST['password'];
            $managername = $_POST['managername'];

            $login = $conn->query("SELECT * FROM managers WHERE email='$email'");
            $login->execute();

            $fetch = $login->fetch(PDO::FETCH_ASSOC);
            if($login->rowCount() > 0){
              echo "<script>alert('Manager already exists')</script>";
              echo "<script> window.location.href='".ADMINURL."/managers/create-managers.php'; </script>";

            }
            else{

                $insert = $conn->prepare("INSERT INTO managers(email, name, password, listing)
                VALUES(:email, :managername, :mypassword, 1)");

                $insert->execute([
                    ":email" => $email,
                    ":mypassword" => password_hash($password, PASSWORD_DEFAULT),
                    ":managername" => $managername,
                ]);

                echo "<script> window.location.href='".ADMINURL."/managers/show-managers.php'; </script>";
            }

       

      

    }
  }



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Manager</h5>
              <form method="POST" action="./create-managers.php">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="managername" id="form2Example1" class="form-control" placeholder="Manager Name" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="Password" />
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
