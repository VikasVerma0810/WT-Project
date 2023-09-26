<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Partials/Search_page_CSS/style.css">
    <link rel="stylesheet" href="./Partials/Booking_page_css/bookingPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Booking Page</title>
</head>
<body>
    <?php require "./Partials/navbar.php" ?>
    <div class="d-flex flex-row justify-content-evenly resort-gallery">
        <div class="gallery-pic d-flex flex-column align-items-center justify-content-between w-100">
            <img width="100%" src="./Partials/Booking_page_css/sampleResort1.jpg" alt="">
            <img width="100%" src="./Partials/Booking_page_css/sampleResort2.jpg" alt="">
        </div>
        <video height="465" autoPlay muted loop >
            <source src="./Partials/resortIntro.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="gallery-pic d-flex flex-column align-items-center justify-content-between w-100">
            <img width="100%" src="./Partials/Booking_page_css/sampleResort3.jpg" alt="">
            <img width="100%" src="./Partials/Booking_page_css/sampleResort4.jpg" alt="">
        </div>
    </div>
    <div class="mx-5 my-4 resort-heading">
        <h1>Resort Name</h1>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 24 24" id="locationmarker"><path d="M12 2a7 7 0 0 0-7 7c0 5.31 6 12.35 6.24 12.65l.76.89.76-.89C13 21.35 19 14.31 19 9a7 7 0 0 0-7-7Zm0 10a3 3 0 1 1 3-3 3 3 0 0 1-3 3Z" data-name="Layer 2" fill="#595bd4" class="color000000 svgShape"></path></svg>
            Location
        </p>
    </div>
    <div class="album py-5 bg-body-tertiary width">
        <div class="container ">
            <h1 class="font-monospace fw-bold text-center">Our Suggestions</h1>
            <div class="row  row-cols-lg-3 gx-4 ">
                <div class="col">
                    <div class="card shadow-sm">
                       
                        <img src="./Partials/Booking_page_css/Hotel1/room3.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-text">Suporior Room</h4>
                            <p>⭐⭐⭐⭐⭐</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid quisquam illo iste!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success"
                                    style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: .75rem;">
                              Book Now
                            </button>
                                </div>
                                <large class="text-body-primary">$250</large>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                       
                        <img src="./Partials/Booking_page_css/Hotel1/room2.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-text">Suporior Room</h4>
                            <p>⭐⭐⭐⭐⭐</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid quisquam illo iste!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success"
                                    style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: .75rem;">
                              Book Now
                            </button>
                                </div>
                                <large class="text-body-primary">$250</large>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                       
                        <img src="./Partials/Booking_page_css/Hotel1/room1.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-text">Suporior Room</h4>
                            <p>⭐⭐⭐⭐⭐</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid quisquam illo iste!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success"
                                    style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: .75rem;">
                              Book Now
                            </button>
                                </div>
                                <large class="text-body-primary">$250</large>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>
</html>