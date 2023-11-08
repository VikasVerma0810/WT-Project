<?php 
    session_start();
    $id = $_SESSION['id'];
    if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
        header("location: ./login.php");
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="./Partials/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./Partials/Search_page_CSS/style.css">
        <title>User Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <style>
        body{
            font-family: sans-serif;
            height: 100vh;
            background-color: #f8f9fa;
        }
        table tr{
            height: 60px;
            border-bottom: 2px solid #adb5bd;
        }
        table tr:first-child{
            width:50%;
        }
        .resp{
            width:80%;
        }
        .update{
            width:100%;
            height:100%;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .boxi{
            width:50%;
        }
        .profileImage {
            height: 100px;
        }
        .profileImage img{
            background-size: contain;
        }
        .custom-file-input {
            display: none; /* Hide the default file input */
        }

        .custom-file-label {
            display: inline-block;
            background-color: transparent;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Style the label to look like a button */

        @media (max-width: 950px) {
            .boxi{
                width: 70%;
            }
        }
        @media (max-width: 610px) {
            table{
                font-size:12px;
            }
            .resp{
                width:90%;
            }
            .boxi{
                width: 90%;
            }
        }
        
    </style>
    <?php
        require "./Partials/connection.php";
        $sql = "select * from log_details where id=".$id."";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];

        $bookings = "select * from booking where id=$id";
        $resultBook = mysqli_query($conn, $bookings);
        $bookNum = mysqli_num_rows($resultBook);
    ?>
    <body>
        <div>
            <?php require "Partials/navbar.php"?>
        </div>
        <div class="d-flex flex-row justify-content-evenly mb-4">
            <div class="col-3">
                <div class="bg-white border border-body-tertiary rounded mt-4">
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']['name'])){
                            $poster = $row['image'];
                            $poster = explode('/', $poster);
                            unlink('admin-panel/resorts/gallery/'.$poster[count($poster)-1]);
                            
                            $image = $_FILES['image']['name'];
                            $updateImg = "UPDATE log_details set image='http://localhost/WT-Project/admin-panel/resorts/gallery/$image' where id=$id";
                            mysqli_query($conn, $updateImg);
                            $dir = "admin-panel/resorts/gallery/". basename($image);

                            if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
                                echo "<script> window.location.href='http://localhost/WT-Project/myProfile.php'; </script>";
                            }
                        }
                    ?>
                    <form id="myProfileImg" class="container mt-5 mb-3 profileImage d-flex flex-row justify-content-center align-items-center" action="./myProfile.php" method="post" enctype="multipart/form-data">
                        <div class="custom-file">
                            <input type="file" name="image" oninput='submitForm()' name="imageInput" class="custom-file-input" id="imageInput" accept="image/*">
                            <label class="custom-file-label" for="imageInput"><img class="rounded-pill border border-3 border-secondary shadow" width="100px" height="100px" src="<?php echo $row['image']; ?>" alt=""></label>
                        </div>
                    </form>
                    <h6 class="text-center fw-bold"><?php echo $name; ?></h6>
                    <h6 class="text-center text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-dark bi bi-telephone-forward me-2" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        <?php echo $phone; ?>
                    </h6>
                    <h6 class="text-center text-secondary mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope me-1" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        <?php echo $email; ?>
                    </h6>
                    <div class="mt-3 border-top border-body-tertiary" style="cursor: pointer;">
                        <h6 class="px-4 py-3 fw-bold m-0 current text-primary bg-info bg-opacity-25">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-100 bi bi-person-lines-fill me-2" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                            </svg>
                            Personal Information
                        </h6>
                    </div>
                    <div class="border-top border-body-tertiary" style="cursor: pointer;">
                        <h6 class="px-4 py-3 fw-bold m-0 current">
                            <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-100 bi bi-person-lines-fill me-2" viewBox="0 0 16 16" id="departure"><path d="M12 1.5V0h-1v1.5H4V0H3v1.5H0v14h15v-14h-3zm-11 1h2V4h1V2.5h7V4h1V2.5h2v4H1v-4zm13 12H1v-7h13v7z"></path><path d="M2.5 11.5h7.793l-1.147 1.146.708.708L12.207 11 9.854 8.646l-.708.708 1.147 1.146H2.5z"></path></svg>
                            My Bookings
                        </h6>
                    </div>
                    <div class="border-top border-body-tertiary" style="cursor: pointer;">
                        <h6 class="px-4 py-3 fw-bold m-0 current">
                            <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-100 bi bi-person-lines-fill me-2" enable-background="new 0 0 32 32" viewBox="0 0 30 30" id="headset"><path d="M18,3h-4C7.93,3,3,7.93,3,14v3.86V21v0.14C3,23.27,5.02,25,7.5,25H9c0.55,0,1-0.45,1-1v-9c0-0.55-0.45-1-1-1H8.01
                            c0.09-3.32,2.81-6,6.16-6h3.67c3.34,0,6.07,2.68,6.16,6H23c-0.55,0-1,0.45-1,1v9c0,0.55,0.45,1,1,1h1.5c0.3,0,0.58-0.03,0.86-0.07
                            c-1.09,1.2-2.64,1.98-4.36,2.06C20.99,26.44,20.55,26,20,26h-4c-0.55,0-1,0.45-1,1v1.5c0,0.55,0.45,1,1,1h4
                            c0.37,0,0.68-0.21,0.85-0.51c4.08-0.07,7.45-3.11,8.04-7.05c0.02-0.07,0.02-0.15,0.04-0.23c0.01-0.08,0.02-0.17,0.03-0.25
                            c0.01-0.11,0.04-0.21,0.04-0.33V21v-3.14V14C29,7.93,24.07,3,18,3z M8,23H7.5C6.15,23,5,22.15,5,21.14V21v-3.14
                            C5,16.85,6.15,16,7.5,16H8V23z M17.83,6h-3.67C9.66,6,6,9.66,6,14.17c0,0.02,0.01,0.04,0.01,0.07c-0.36,0.11-0.7,0.24-1.01,0.42V14
                            c0-4.96,4.04-9,9-9h4c4.96,0,9,4.04,9,9v0.65c-0.31-0.18-0.66-0.31-1.01-0.42c0-0.02,0.01-0.04,0.01-0.07C26,9.66,22.34,6,17.83,6z
                            M24.5,23H24v-7h0.5c1.35,0,2.5,0.85,2.5,1.86v2.84c0,0.28-0.02,0.55-0.06,0.82C26.69,22.36,25.68,23,24.5,23z"></path></svg>
                            Help and Support
                        </h6>
                    </div>
                    <div class="border-top border-body-tertiary bg-danger bg-opacity-25 text-danger" style="cursor: pointer;">
                        <a href="./logout.php" class="text-danger" style="text-decoration:none;">
                            <h6 class="px-4 py-3 fw-bold m-0">
                            <svg  xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-100 bi me-2" width="24" height="24" id="logout"><path d="M15 24H1c-.6 0-1-.4-1-1V1c0-.6.4-1 1-1h14c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1s-1-.4-1-1V2H2v20h12v-6c0-.6.4-1 1-1s1 .4 1 1v7c0 .6-.4 1-1 1z"></path><path d="M23 13H8c-.6 0-1-.4-1-1s.4-1 1-1h15c.6 0 1 .4 1 1s-.4 1-1 1z"></path><path d="M23 13c-.3 0-.5-.1-.7-.3l-4-4c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l4 4c.4.4.4 1 0 1.4-.2.2-.4.3-.7.3z"></path><path d="M19 17c-.3 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4-4c.4-.4 1-.4 1.4 0s.4 1 0 1.4l-4 4c-.2.2-.4.3-.7.3z"></path></svg>
                                Logout
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <div class="flex-wrap flex-column align-items-center con">
                    <div class="resp p-4 mt-4 rounded border border-body-tertiary mb-3 bg-white">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <strong class="h-100">&nbsp;&nbsp;&nbsp;Personal Information</strong>
                            <button onclick="updateInfo()" type="button" class="btn btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>
                        </div>
                        <hr class="mb-0">
                        <div class="mx-2 d-flex flex-row flex-wrap">
                            <div class="w-50 mt-4" style="min-width:300px;">
                                <span class="text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                    Name <br>
                                </span>
                                <span class="ms-4"><?php echo $name; ?></span>
                            </div>
                            <div class="w-50 mt-4" style="min-width:300px;">
                                <span class="text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                    Email <br>
                                </span>
                                <span class="ms-4"><?php echo $email; ?></span>
                            </div>
                            <div class="w-50 mt-4" style="min-width:300px;">
                                <span class="text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                    Phone <br>
                                </span>
                                <span class="ms-4"><?php echo $phone; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-wrap flex-column align-items-center con">
                    <div class="resp p-4 mt-4 rounded border border-body-tertiary mb-3 bg-white">
                        <div class="d-flex flex-row align-items-center">
                            <strong class="h-100">&nbsp;&nbsp;&nbsp;My Bookings</strong>
                        </div>
                        <hr class="mb-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Booking Person</th>
                                    <th scope="col">Mobile No.</th>
                                    <th scope="col">Number of Persons</th>
                                    <th scope="col">Visit Resort</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                for ($i=0; $i < $bookNum; $i++) { 
                                    $bookRow = mysqli_fetch_assoc($resultBook);
                                    echo '<tr>
                                        <td>'.$bookRow['name'].'</td>
                                        <td>'.$bookRow['mobile'].'</td>
                                        <td>'.$bookRow['count'].'</td>
                                        <td><a  href="./booking.php?id='.$bookRow['rid'].'" class="btn btn-warning text-white text-center ">View Resort</a></td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table> 
                    </div>
                </div>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['query'])){
                        $query = $_POST['query'];

                        $sqlQuery = "INSERT INTO `query` (`uid`, `query`) VALUES ('$id', '$query')";
                        mysqli_query($conn, $sqlQuery);
                        echo '<script>alert("Query has been recorded successfully.")</script>';
                    }
                ?>
                <div class="flex-wrap flex-column align-items-center con">
                    <form action="./myProfile.php" method="post" class="resp p-4 mt-4 rounded border border-body-tertiary mb-3 bg-white">
                        <div class="form-floating">
                            <textarea class="form-control" name="query" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Please leave your query here</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Send</button>
                    </form>
                </div>

            </div>
        </div>
        <?php require "./Partials/footer.php"?>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $updateProf = "UPDATE log_details set name='$name', email='$email', phone='$phone' where id=$id";
                mysqli_query($conn, $updateProf);
                echo '<script>alert("Profile has been updated successfully.")</script>';
                echo "<script> window.location.href='http://localhost/WT-Project/myProfile.php'; </script>";
            }
        ?>
        <div class="position-fixed top-0 start-0 update" id="nameCh"> </div>
    </body>
    <script>
        let update = document.getElementById("nameCh");
        update.style.display = "none";

        let currentTab = document.getElementsByClassName('current')

        let box = document.getElementsByClassName('con')
        box[0].style.display = "flex"
        for (let index = 1; index < box.length; index++) {
            const element = box[index];
            element.style.display = "none"
        }

        Array.from(currentTab).forEach(element => {
            element.addEventListener('click', ()=>{
                // console.log(element)
                for (let index = 0; index < currentTab.length; index++) {
                    if (currentTab[index].classList.contains('text-primary')) {
                        currentTab[index].classList.remove('text-primary', 'bg-info', 'bg-opacity-25')
                    }
                    if (element == currentTab[index]) {
                        box[index].style.display = "flex"
                    }
                    else{
                        box[index].style.display = "none"
                    }
                }
                element.classList.add('text-primary', 'bg-info', 'bg-opacity-25')
            })
        });


        // updating profile image 
        var ProfImg = document.getElementById("myProfileImg");
        function submitForm() {
            ProfImg.submit()
        }

        function updateInfo() {
            update.style.display = "block";
            update.innerHTML = `<div class="boxi bg-light rounded position-absolute top-50 start-50 translate-middle">
            <div class="d-flex w-100 justify-content-end pt-2 pe-2">
            <svg xmlns="http://www.w3.org/2000/svg" onclick="closeName()" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16" style="cursor: pointer;">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
            </div>
                <form class="p-4 pt-0 d-flex flex-column formBox" style="min-width: 300px;" method="post" action="./myProfile.php">    
                    <div class="mb-2 d-flex flex-column justify-content-between">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name ?>" class="mt-1 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email ?>" class="mt-1 mb-3">
                    <label>Mobile No.</label>
                    <input type="number" name="phone" value="<?php echo $phone ?>" class="mt-1 mb-3">
                    <button type="submit" class=" btn btn-primary col-8 my-2" style="max-width:200px;">Update Profile</button>
                    </div>
                </form>
            </div>`;
        }
        function closeName() {
        update.style.display = "none";
    }
    </script>
</html>