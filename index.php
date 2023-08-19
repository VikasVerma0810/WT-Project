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
    <header class="position-sticky start-0 top-0">
        <nav class="navbar navbar-expand-lg " data-bs-theme="dark">
            <div class="container-fluid" style="width: 90%;">
                <a class="navbar-brand fs-2" href="#"><strong>Resort</strong></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav justify-content-evenly mx-auto mb-2 mb-lg-0 fs-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Contact</a>
                        </li>
                    </ul>
                    <a class="btn btn-warning rounded-pill me-3" href="./login.php" role="button">Book Room</a>
                    <a class="btn btn-warning rounded-pill" href="./logout.php" role="button">Logout</a>
                </div>
            </div>
        </nav>
    </header>


    <div id="carouselExample" class="carousel slide bg-black" style="z-index: 0;">
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img alt="..." class="d-block w-100" src="./CSS/img/banner/banner.png">
                <div class="carousel-caption">
                    <h5 class="animated bounceInRight fs-1" style="animation-delay: 1s">Web Design</h5>
                    <p class="animated bounceInLeft" style="animation-delay: 2s">Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="./CSS/img/banner/banner2.png">
                <div class="carousel-caption">
                    <h5 class="animated bounceInRight fs-1" style="animation-delay: 1s">Web Design</h5>
                    <p class="animated bounceInLeft" style="animation-delay: 2s">Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
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
                        <p>Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare
                            dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque
                            sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.</p>
                        <a href="#" class="line-button">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb d-flex justify-content-between">
                        <div class="img_1">
                            <img src="./CSS/img/about/about_1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="./CSS/img/about/about_2.png" alt="">
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
                        <img src="./CSS/img/offers/1.png" width="100%" alt="">
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now w-100 py-2">book now</a>
                    </div>
                </div>
                <div class="single_offers border border-2 border-primary p-4 mt-4">
                    <div class="">
                        <div class="about_thumb">
                            <img src="./CSS/img/offers/2.png" width="100%" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now w-100 py-2">book now</a>
                    </div>
                </div>
                <div class="single_offers border border-2 border-primary p-4 mt-4">
                    <div class="">
                        <div class="about_thumb">
                            <img src="./CSS/img/offers/3.png" width="100%" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now w-100 py-2">book now</a>
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
                            <img src="./CSS/img/about/1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="./CSS/img/about/2.png" alt="">
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
                        <p>Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare
                            dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque
                            sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.</p>
                        <a href="#" class="line-button">Learn More</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

   
    <div class=" bg_color bg-black">
        <div class="container">
            <footer class="py-5">
                <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Address</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">200, Green road, Mongla,</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">New Yor City USA</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light"><a href="">Get Direction</a></a></li>
                        </ul>
                    </div>
            
                    <div class="col-6 col-md-2 mb-3">
                    <h5>Reservation</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">+10 367 267 2678</a></li>
                    </ul>
                    </div>
            
                    <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">Rooms</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">About</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">Conatct</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-primary text-light">Blog</a></li>
                    </ul>
                    </div>
            
                    <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address" fdprocessedid="vlsiv">
                        <button class="btn btn-primary" type="button" fdprocessedid="y9h4n">Subscribe</button>
                        </div>
                    </form>
                    </div>
                </div>
            
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>© 2023 Company, Inc. All rights reserved.</p>
                    <!-- <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                    </ul> -->
                </div>
            </footer>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous">
    </script>
</body>

</html>

