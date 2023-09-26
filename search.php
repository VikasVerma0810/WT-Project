<?php session_start();
    require "./Partials/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Partials/Search_page_CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>

        .hero {
            background-image: url('./Partials/img/rooms/Search_page.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
       
    </style>
    <title>Resort Search</title>
</head>
<!-- id  -->
<!-- name  -->
<!-- per day rate  -->
<!-- attributs  -->
<!-- gallery -->
<!-- location  -->
<!-- ratings -->
<!-- <iframe width="930" height="523" src="https://www.youtube.com/embed/bpEnbEEIgQo" title="West Downs - The Heritage Resort | Best Resort in Ooty" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->

<body>
    <?php require "./Partials/navbar.php" ?>
    <section class="hero">
        <div class="hero-content">
            <h1>Find Your Dream Resort</h1>
            <div class="search-bar">
                <input type="text" id="location" placeholder="Enter Location">
                <input type="text" id="checkin" class="datepicker" placeholder="Check-In Date">
                <input type="text" id="checkout" class="datepicker" placeholder="Check-Out Date">
                <button class="btn btn-primary btn-lg">Search</button>
            </div>
        </div>
    </section>

    <h1 class="centered-title">Our Featured Resort</h1>
    
    <div class="container mt">
        <div class="row">
        <?php
            $sql = "select * from resortinfo";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            for ($i=0; $i < $num; $i++) { 
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $name = $row['Name'];
                $desc = $row['description'];
                $img = $row['poster'];
                echo 
                '<div class="col-md-4">
                    <div class="card card-img ">
                        <img src="'.$img.'" alt="Luxury Resort">
                        <h2 class="card-title p-1">'.$name.'</h2>
                        <p class="card-description px-1">'.$desc.'</p>
                        <a href="./booking.php?id='.$id.'" class="btn btn-success">Book Now</a>
                    </div>
                </div>';
            }
        ?>
        </div>
    </div>
    <?php require "./Partials/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $(".datepicker").datepicker();
        });
    </script>
</body>
</html>
