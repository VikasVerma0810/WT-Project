<?php session_start() ?>
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
            <div class="col-md-4">
                <div class="card card-img ">
                    <img src="./Partials/img/Resort/resort1.jpg" alt="Luxury Resort">
                    <h2 class="card-title p-1">Azure Haven Resort</h2>
                    <p class="card-description px-1">Discover paradise at Azure Haven Resort. Immerse yourself in luxury, surrounded by crystal-clear waters and pristine beaches.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot2.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Mountain Vista Retreat</h2>
                    <p class="card-description px-1">Elevate your senses at Mountain Vista Retreat. Embrace nature's beauty while enjoying top-tier amenities and breathtaking views.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot3.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Sunset Serenity Resort</h2>
                    <p class="card-description px-1">Experience tranquility at Sunset Serenity Resort. Unwind on golden shores as the sun paints the sky with hues of orange and pink.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4 h-100">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot4.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Tropical Oasis Getaway</h2>
                    <p class="card-description px-1">Escape to the Tropical Oasis Getaway. Swaying palms, turquoise waters, and indulgent relaxation await you.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot5.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Rustic Elegance Lodge</h2>
                    <p class="card-description px-1">Find luxury in nature at Rustic Elegance Lodge. Unplug and recharge in the heart of the wilderness, surrounded by comfort.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot6.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Crystal Springs Spa & Resort</h2>
                    <p class="card-description px-1">Rejuvenate your soul at Crystal Springs Spa & Resort. Luxuriate in spa treatments and revitalize amidst nature's serenity.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot7.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Whispering Pines Retreat</h2>
                    <p class="card-description px-1">Uncover tranquility at Whispering Pines Retreat. Nestled in the woods, find solace in the soft rustle of leaves and chirping birds.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot8.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Seaside Bliss Resort</h2>
                    <p class="card-description px-1">Discover pure joy at Seaside Bliss Resort. Let the rhythmic waves and endless coastline awaken your sense of adventure.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-img">
                    <img src="./Partials/img/Resort/resrot9.jpg" alt="Seaside Retreat">
                    <h2 class="card-title p-1">Eternal Sands Oasis</h2>
                    <p class="card-description px-1">Embark on a desert adventure at Eternal Sands Oasis. Witness the magic of starry nights and the allure of endless dunes.</p>
                    <button class="btn btn-success">Book Now</button>
                </div>
            </div>
            <!-- Add more columns for additional cards -->
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
