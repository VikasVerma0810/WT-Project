<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Reost Booking System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="./Partials/Home_Page_CSS/style.css">
    </head>
<body>
    <?php require "./Partials/navbar.php" ?>


    <div id="carouselExample" class="carousel slide bg-black" style="z-index: 0;">
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img alt="..." class="d-block w-100" src="./Partials/img/banner/banner.png">
                <div class="carousel-caption">
                    <h5 class="animated bounceInRight fs-1" style="animation-delay: 1s">Create Unforgettable Moments</h5>
                    <p class="animated bounceInLeft" style="animation-delay: 2s">"Experience unparalleled luxury in our well-appointed suites and villas. Every room is designed for your relaxation and features stunning views of our tropical paradise."</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="./Partials/img/banner/banner2.png">
                <div class="carousel-caption">
                    <h5 class="animated bounceInRight fs-1" style="animation-delay: 1s">Adventure Awaits</h5>
                    <p class="animated bounceInLeft" style="animation-delay: 2s">"Host your dream wedding or special event in our stunning venues. Our dedicated team will make your occasion truly magical."</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="about_area my-5 container">
        <div class="">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div >
                        <div class="section_title mb-20px">
                            <span>About Us</span>
                            <h3 class="about_info">A Luxuries Hotel <br>
                                with Nature</h3>
                        </div>
                        <p>We take pride in offering the highest standards of service and comfort. Our well-appointed accommodations provide a haven of luxury, each with its unique charm and breathtaking views. Immerse yourself in the serenity of our gardens, savor the flavors of our exquisite cuisine, and indulge in relaxation at our spa and wellness center.</p>
                    
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb d-flex justify-content-between">
                        <div class="img_1">
                            <img src="./Partials/img/about/about_1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="./Partials/img/about/about_2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- offers_area_start -->
     <div class="offers_area mb-5">
        <div class="mx-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Our Offers</span>
                        <h3 class="offer">Ongoing Offers</h3>
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-row flex-wrap justify-content-evenly align-items-center">
                <div class="single_offers border border-2 border-primary p-4 mt-4">
                    <div class="w-100 d-flex flex-column align-items-center">
                        <img src="./Partials/img/offers/1.png" width="100%" alt="">
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="./search.php" class="book_now w-100 py-2">book now</a>
                    </div>
                </div>
                <div class="single_offers border border-2 border-primary p-4 mt-4">
                    <div class="">
                        <div class="about_thumb">
                            <img src="./Partials/img/offers/2.png" width="100%" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="./search.php" class="book_now w-100 py-2">book now</a>
                    </div>
                </div>
                <div class="single_offers border border-2 border-primary p-4 mt-4">
                    <div class="">
                        <div class="about_thumb">
                            <img src="./Partials/img/offers/3.png" width="100%" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="./search.php" class="book_now w-100 py-2">book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->



    <div class="about_area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_thumb d-flex justify-content-between">
                        <div class="img_1">
                            <img src="./Partials/img/about/1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="./Partials/img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div >
                        <div class="section_title mb-20px">
                            <span>Delicious Food</span>
                            <h3 class="about_info">We Serve Fresh and<br>
                                Delicious Food</h3>
                        </div>
                        <p>Experience an exquisite culinary journey at our resort, where our culinary team creates masterpieces from fresh, locally sourced ingredients and international delicacies, all against a backdrop of breathtaking views. From romantic beachfront dinners to personalized menus for special occasions, we're dedicated to making your dining experience as memorable as your stay.</p>
                       
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <?php require "./Partials/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous">
    </script>
</body>

</html>


