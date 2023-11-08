<?php session_start() ?>
<?php

    $login = 0;
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']) {
            $login = 0;
        }
    }
    require './Partials/connection.php';

    $rid = $_GET['id'];

    $sql = "select * from resortinfo where id=$rid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $resName = $row['Name'];
    $location = $row['location'];
    $price = $row['price'];
    $discount = $row['discount'];
    $contact_info = $row['contact_info'];
    $highlights = $row['highlights'];
    $overview = $row['overview'];
    $more = $row['more'];
    $image = $row['poster'];
    
?>
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
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Mooli&family=Poppins&family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Booking Page</title>
</head>

<style>
    .update{
            width:100%;
            height:100%;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .boxi{
            width:50%;
        }
</style>



<body class="bg-light">
    <?php require "./Partials/navbar.php" ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $person = $_POST['person'];
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];

        $sql = "INSERT INTO `booking` (`id`, `rid`, `name`, `mobile`, `count`, `checkIn`, `checkOut`) VALUES ('$id', '$rid', '$name', '$mobile', '$person', '$checkIn', '$checkOut')";
        mysqli_query($conn, $sql);
        echo '<script>alert("Resort has been booked successfully.")</script>';
    }
?>
    <div class="d-flex flex-row justify-content-evenly resort-gallery">
        <img class = "col-6 border-end border-light border-2" src="<?php echo $image; ?>" alt="">
        <div class="gallery-pic d-flex flex-column align-items-center justify-content-between col-3 border-end border-start border-light border-2">
            <img width="100%" height="50%" src="./Partials/Booking_page_css/sampleResort1.jpg" class="border-bottom border-light border-2" alt="">
            <img width="100%" height="50%" src="./Partials/Booking_page_css/sampleResort2.jpg" class="border-top border-light border-2" alt="">
        </div>
        <div class="gallery-pic d-flex flex-column align-items-center justify-content-between col-3 border-start border-light border-2">
            <img width="100%" height="50%" src="./Partials/Booking_page_css/sampleResort3.jpg" class="border-bottom border-light border-2" alt="">
            <img width="100%" height="50%" src="./Partials/Booking_page_css/sampleResort4.jpg" class="border-top border-light border-2" alt="">
        </div>
    </div>
    <div class="px-5 py-4 resort-heading bg-info bg-opacity-25">
        <div class="container">
            <h1><?php echo $resName; ?></h1>
            <div class="reviews-section d-flex flex-row justify-content-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 24 24" id="locationmarker">
                        <path d="M12 2a7 7 0 0 0-7 7c0 5.31 6 12.35 6.24 12.65l.76.89.76-.89C13 21.35 19 14.31 19 9a7 7 0 0 0-7-7Zm0 10a3 3 0 1 1 3-3 3 3 0 0 1-3 3Z" data-name="Layer 2" fill="#595bd4" class="color000000 svgShape"></path>
                    </svg>
                    <?php echo $location; ?> - <a href="#" class="text-primary fw-bold">Show Map</a>
                </div>
                <div>
                    <span class="rating-box px-4 py-1 align-items-center rounded fw-bold shadow-sm text-light bg-success fs-5 mx-4">4.5 / 5</span>
                    <span>(224 reviews)</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-row justify-content-evenly">
        <div class="col-8 desc-boxes">
            <div class="mt-5">
                <div class="row g-2 border m-0 bg-white justify-content-center">
                    <div class="col-6 text-center">
                        <div class="p-3 "> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-wifi text-primary" viewBox="0 0 16 16">
                                <path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z"/>
                                <path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z"/>
                            </svg>
                            <span class="service-name">Wi-Fi Inclusive</span>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 ">
                            <svg height="25" width="25" fill="#0091ff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" class="text-primary"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#0091ff;" d="M53.966,405.224c-7.133,0-13.047-5.585-13.348-12.77c-0.143-3.425-0.199-55.659-0.199-56.173 c0-118.872,96.709-215.582,215.582-215.582c48.738,0,96.505,16.725,134.5,47.094c37.408,29.899,64.108,71.873,75.179,118.191 c1.717,7.185-2.714,14.4-9.897,16.118c-7.173,1.713-14.402-2.714-16.118-9.898c-20.376-85.231-95.9-144.757-183.665-144.757 c-104.123,0-188.833,84.71-188.833,188.833c0,5.751,0.076,51.956,0.177,55.095c0.237,7.357-5.516,13.567-12.872,13.839 C54.304,405.222,54.134,405.224,53.966,405.224z"></path> <path style="fill:#0091ff;" d="M256.001,134.073c13.851,0,27.374,1.396,40.442,4.048c3.801-6.733,5.98-14.502,5.98-22.783 c0-25.638-20.784-46.421-46.421-46.421c-25.638,0-46.421,20.784-46.421,46.421c0,8.283,2.179,16.052,5.98,22.783 C228.626,135.469,242.15,134.073,256.001,134.073z"></path> <path style="fill:#0091ff;" d="M296.444,151.497c-0.881,0-1.773-0.087-2.663-0.267c-24.72-5.018-50.844-5.018-75.562,0 c-5.677,1.153-11.457-1.483-14.307-6.532c-5.044-8.931-7.708-19.084-7.708-29.358c0-32.972,26.824-59.796,59.796-59.796 c32.971,0,59.796,26.824,59.796,59.796c0,10.277-2.666,20.43-7.71,29.361C305.683,148.955,301.198,151.497,296.444,151.497z M256.001,120.699c10.758,0,21.524,0.8,32.125,2.383c0.61-2.526,0.921-5.128,0.921-7.745c0-18.223-14.824-33.047-33.047-33.047 s-33.047,14.824-33.047,33.047c0,2.616,0.312,5.217,0.921,7.745C234.477,121.498,245.241,120.699,256.001,120.699z"></path> <path style="fill:#0091ff;" d="M468.498,443.082H43.502c-16.57,0-30.127-13.558-30.127-30.127l0,0 c0-16.57,13.558-30.127,30.127-30.127h424.996c16.57,0,30.127,13.558,30.127,30.127l0,0 C498.626,429.524,485.069,443.082,468.498,443.082z"></path> <path style="fill:#0091ff;" d="M468.498,456.457H43.502C19.515,456.457,0,436.942,0,412.955c0-23.987,19.515-43.502,43.502-43.502 H468.5c23.987,0,43.5,19.515,43.5,43.5C512,436.939,492.485,456.457,468.498,456.457z M43.502,396.203 c-9.238,0-16.753,7.515-16.753,16.751c0,9.236,7.515,16.753,16.753,16.753H468.5c9.236,0,16.751-7.515,16.751-16.751 c0-9.236-7.515-16.753-16.751-16.753H43.502z"></path> </g></svg>
                            <span class="service-name">In Room Dining</span>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 ">
                            <svg height="25" width="25" fill="#0091ff" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="text-primary"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M13.46875 0C8.777344 0 4.9375 3.816406 4.9375 8.5C4.9375 13.183594 8.777344 17 13.46875 17L16 17L16 22L21 22L21 17L32 17L32 41L25.8125 41C26.140625 40.535156 26.464844 39.980469 26.78125 39.3125C27.992188 36.75 29 32.601563 29 26C29 25.449219 28.550781 25 28 25L9 25C8.96875 25 8.9375 25 8.90625 25C8.390625 25.046875 7.996094 25.480469 8 26C8 26.792969 8.003906 27.558594 8.03125 28.28125C7.585938 28.113281 7.078125 28 6.5 28C4.027344 28 2 30.027344 2 32.5C2 34.972656 4.027344 37 6.5 37L9.34375 37C9.617188 37.890625 9.90625 38.648438 10.21875 39.3125C10.535156 39.980469 10.859375 40.535156 11.1875 41L7.5 41C6.132813 41 5 42.132813 5 43.5L5 47.5C5 48.867188 6.132813 50 7.5 50L45.5 50C47.421875 50 49 48.421875 49 46.5L49 42C49.003906 41.949219 49.003906 41.894531 49 41.84375L44.4375 14.5625C46.019531 13.019531 47 10.871094 47 8.5C47 3.816406 43.160156 0 38.46875 0 Z M 13.46875 2L38.46875 2C42.082031 2 45 4.898438 45 8.5C45 12.101563 42.082031 15 38.46875 15L17.1875 15C17.054688 14.972656 16.914063 14.972656 16.78125 15L13.46875 15C9.855469 15 6.9375 12.101563 6.9375 8.5C6.9375 4.898438 9.855469 2 13.46875 2 Z M 42.625 15.90625L47 42.15625L47 46.5C47 47.339844 46.339844 48 45.5 48L7.5 48C7.214844 48 7 47.785156 7 47.5L7 43.5C7 43.214844 7.214844 43 7.5 43L33 43C33.550781 43 34 42.550781 34 42L34 17L38.46875 17C39.976563 17 41.394531 16.597656 42.625 15.90625 Z M 18 17L19 17L19 20L18 20 Z M 10.09375 27L26.90625 27C26.792969 32.6875 25.9375 36.386719 24.96875 38.4375C24.453125 39.53125 23.933594 40.214844 23.53125 40.59375C23.226563 40.878906 22.957031 40.972656 22.9375 41L14.0625 41C14.042969 40.972656 13.773438 40.878906 13.46875 40.59375C13.066406 40.214844 12.546875 39.53125 12.03125 38.4375C11.0625 36.386719 10.207031 32.6875 10.09375 27 Z M 6.5 30C7.308594 30 7.875 30.394531 8.21875 30.71875C8.363281 32.347656 8.574219 33.757813 8.84375 35L6.5 35C5.109375 35 4 33.890625 4 32.5C4 31.109375 5.109375 30 6.5 30 Z M 40 35C38.894531 35 38 35.894531 38 37C38 38.105469 38.894531 39 40 39C41.105469 39 42 38.105469 42 37C42 35.894531 41.105469 35 40 35Z"></path></g></svg>
                            <span class="service-name">Tea/Coffee Maker</span>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 ">
                            <svg height="25" width="25" viewBox="0 0 1024 1024" fill="#0091ff" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M383.2 941.6c-4 0-6.4-0.8-9.6-2.4-14.4-9.6-82.4-60-25.6-160 15.2-27.2 19.2-48.8 13.6-66.4-6.4-20-27.2-28-27.2-28-9.6-4-14.4-15.2-10.4-24.8 3.2-8 9.6-12.8 17.6-12.8 2.4 0 4.8 0.8 7.2 1.6 3.2 0 36.8 14.4 50.4 50.4 10.4 28.8 4.8 62.4-16.8 100-40 70.4 2.4 101.6 11.2 107.2 8.8 4.8 12 16.8 7.2 26.4-4.8 6.4-12 8.8-17.6 8.8z m129.6-42.4c-4 0-6.4-0.8-9.6-2.4-28.8-16.8-69.6-68.8-24-150.4 13.6-24.8 17.6-44.8 12-60-5.6-17.6-24-24.8-24-24.8-10.4-4-15.2-14.4-11.2-24.8 3.2-8 9.6-12.8 17.6-12.8 2.4 0 4.8 0.8 7.2 1.6 8 3.2 36 16 47.2 48 9.6 27.2 4.8 58.4-15.2 92.8-38.4 68.8 8 96.8 10.4 97.6 4 2.4 7.2 6.4 8.8 11.2 1.6 4.8 0.8 10.4-1.6 15.2-4.8 6.4-12 8.8-17.6 8.8z m-265.6 0c-4 0-6.4-0.8-9.6-2.4-28.8-16.8-69.6-68.8-24-150.4 13.6-24.8 17.6-44.8 12-60-5.6-17.6-24-24.8-24-24.8-10.4-4-15.2-14.4-11.2-24.8 3.2-8 9.6-12.8 17.6-12.8 2.4 0 4.8 0.8 7.2 1.6 8 3.2 36 16.8 47.2 48 9.6 27.2 4 58.4-15.2 93.6-38.4 68.8 8 96.8 10.4 97.6 4 2.4 7.2 6.4 8.8 11.2 1.6 4.8 0.8 10.4-1.6 15.2-4 5.6-12 8-17.6 8z m487.2-71.2c-6.4 0-11.2-2.4-15.2-6.4s-6.4-9.6-6.4-15.2c0-8.8 5.6-16.8 13.6-20.8h0.8v-43.2l-40.8 23.2v0.8c0 6.4-2.4 14.4-10.4 18.4-3.2 2.4-7.2 3.2-11.2 3.2-8 0-15.2-4-18.4-10.4-3.2-5.6-4-11.2-2.4-16.8 1.6-5.6 4.8-10.4 10.4-12.8 3.2-2.4 7.2-3.2 10.4-3.2 4 0 8 0.8 11.2 3.2l36.8-20.8-36-20.8c-4.8 1.6-8.8 2.4-12 2.4-4 0-7.2-0.8-10.4-2.4-9.6-6.4-13.6-20-8-29.6 4-6.4 11.2-10.4 19.2-10.4 4 0 8 0.8 11.2 3.2 6.4 4 10.4 10.4 10.4 18.4v0.8L728 712v-43.2h-0.8c-8-4-13.6-12-13.6-20.8 0-12 9.6-21.6 21.6-21.6 6.4 0 12 2.4 16 6.4s6.4 9.6 6.4 15.2c0 7.2-4 14.4-11.2 18.4H744v41.6l35.2-20v-0.8c0-6.4 2.4-14.4 10.4-18.4 3.2-2.4 7.2-3.2 11.2-3.2 8 0 15.2 4 18.4 10.4 3.2 5.6 4 11.2 2.4 16.8-1.6 5.6-4.8 10.4-10.4 12.8-3.2 2.4-7.2 3.2-10.4 3.2-4 0-8-0.8-11.2-3.2l-36.8 20.8 36 20.8c4.8-1.6 8.8-2.4 12-2.4 4 0 7.2 0.8 10.4 2.4 9.6 6.4 13.6 20 8 29.6-4 6.4-11.2 10.4-19.2 10.4-4 0-8-0.8-11.2-3.2-6.4-4-10.4-10.4-10.4-18.4v-0.8L744 745.6v41.6h0.8c7.2 3.2 11.2 10.4 11.2 18.4 0 12.8-9.6 22.4-21.6 22.4zM152 575.2c-60.8 0-109.6-48.8-109.6-109.6V204.8c0-60.8 48.8-109.6 109.6-109.6h721.6c60.8 0 109.6 48.8 109.6 109.6v260.8c0 60.8-48.8 109.6-109.6 109.6H152z m-11.2-432c-28.8 0-52 24-52 54.4v278.4c0 29.6 23.2 54.4 52 54.4h743.2c28.8 0 52-24 52-54.4V197.6c0-29.6-23.2-54.4-52-54.4H140.8z m21.6 312c-10.4 0-19.2-8.8-19.2-19.2 0-10.4 8.8-19.2 19.2-19.2h682.4c10.4 0 19.2 8.8 19.2 19.2 0 10.4-8.8 19.2-19.2 19.2H162.4z m0-80.8c-10.4 0-19.2-8.8-19.2-19.2S152 336 162.4 336h682.4c10.4 0 19.2 8.8 19.2 19.2 0 10.4-8.8 19.2-19.2 19.2H162.4z" fill=""></path></g></svg>
                            <span class="service-name">Air Conditioner</span>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 ">
                        <svg height="25" width="25" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#0091ff" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect x="17.68" y="5.44" width="28.64" height="50.59" rx="2"></rect><line x1="17.68" y1="20.84" x2="45.82" y2="20.84"></line><line x1="22.12" y1="11.03" x2="22.12" y2="14.71" stroke-linecap="square"></line><line x1="22.12" y1="26.25" x2="22.12" y2="29.93" stroke-linecap="square"></line><line x1="23.12" y1="56.03" x2="23.12" y2="58.56" stroke-linecap="square"></line><line x1="40.39" y1="56.03" x2="40.39" y2="58.56" stroke-linecap="square"></line></g></svg>
                            <span class="service-name">Mini Refrigerator</span>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tv text-primary" viewBox="0 0 16 16">
                                <path d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3h11.991zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2z"/>
                            </svg>
                            <span class="service-name">LCD/LED TV </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white border border-body-tertiary my-4">
                <h3 class="ps-3 my-3 border-start border-4 border-primary fw-bold">Resort Highlights</h3>
                <ul class="mx-5">
                    <?php
                        $highlights = explode('<--->', $highlights);
                        for ($i=0; $i < count($highlights); $i++) { 
                            echo "<li class='mb-4' style='list-style: unset;'>$highlights[$i]</li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="bg-white border border-body-tertiary my-4">
                <h3 class="ps-3 my-3 border-start border-4 border-primary fw-bold">Resort Overview</h3>
                <ul class="mx-5">
                    <?php
                        $overview = explode('<--->', $overview);
                        for ($i=0; $i < count($overview); $i++) { 
                            echo "<li class='mb-4' style='list-style: unset;'>$overview[$i]</li>";
                        }
                    ?>
                </ul>
            </div>
            <div>
                <h3 class="ps-3 my-3 border-start border-4 border-primary fw-bold">Select Package</h3>
            </div>
            <div class="bg-white border border-body-tertiary my-4">
                <h3 class="ps-3 my-3 border-start border-4 border-primary fw-bold">More Details about Resort</h3>
                <ul class="mx-5">
                    <?php
                        $more = explode('<--->', $more);
                        for ($i=0; $i < count($more); $i++) { 
                            echo "<li class='mb-4' style='list-style: unset;'>$more[$i]</li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        
        <div class="col-3">
            <div class=" bg-white border border-body-tertiary mt-5 mb-4 px-3 py-2 rounded w-100 shadow">
                <p class="mb-1">Starting from <del class="text-danger">USD <?php echo $price; ?></del></p>
                <div class="d-flex flex-row align-item-center">
                    <div>
                        <h2 class="text-primary m-0">USD <?php echo ($price - $price*($discount/100)); ?></h2>
                        <p class="text-primary text-center m-0">Per Room</p>
                    </div>
                    <div class="m-3 bg-info bg-opacity-50 py-1 px-2 text-primary rounded">
                        <?php echo $discount; ?>% Off
                    </div>
                </div>
                <button onclick='openName(<?php echo $login; ?>)' type="button" class="btn btn-primary w-100 mt-3">Book Now</button>
            </div>

            <div class=" bg-white border border-body-tertiary my-4 px-3 py-3 rounded w-100">
                <h6>Got a Question?</h6>
                <hr class="my-2">
                <p class="p-2" style="font-size:15px;">Our Destination expert will be happy to help you resolve your queries for this tour.</p>
                <p class="px-2 fw-bold" style="font-size:15px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-primary bi bi-telephone-forward me-2" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <?php echo $contact_info; ?>
                </p>
                <p class="px-2 text-center" style="font-size:15px;">
                    10:30 AM - 8:00 PM (Mon to Sat)
                </p>
            </div>
        </div>
    </div>
    

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h1 class="font-monospace fw-bold text-center mb-0">Our Suggestions</h1>
            <div class="horizon-lines text-center d-flex flex-column align-items-center">
                <hr>
                <hr>
            </div>
            <div class="row  row-cols-lg-3 gx-4 mt-3">
                <div class="col ">
                    <div class="card sug-card shadow-sm">
                        <img src="./Partials/Booking_page_css/Hotel1/room3.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-text">Superior Room</h4>
                            <p>⭐⭐⭐⭐⭐</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid quisquam illo iste!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success" style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: .75rem;">
                                        Book Now
                                    </button>
                                </div>
                                <large class="text-body-primary">$250</large>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sug-card shadow-sm">
                        <img src="./Partials/Booking_page_css/Hotel1/room2.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-text">Soperior Room</h4>
                            <p>⭐⭐⭐⭐⭐</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid quisquam illo iste!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success" style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: .75rem;">
                                        Book Now
                                    </button>
                                </div>
                                <large class="text-body-primary">$250</large>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sug-card shadow-sm">
                        <img src="./Partials/Booking_page_css/Hotel1/room1.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-text">Soperior Room</h4>
                            <p>⭐⭐⭐⭐⭐</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid quisquam illo iste!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success" style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: .75rem;">
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
    <?php require "./Partials/footer.php" ?>
    <div class="position-fixed top-0 start-0 update" id="nameCh"> </div>
</body>
<script>
    let update = document.getElementById("nameCh");
    update.style.display = "none";
    
    function closeName() {
        update.style.display = "none";
    }

    let openName = (field) => {
        if (field) {
            
            update.style.display = "block";
            update.innerHTML = `<div class="boxi bg-light rounded position-absolute top-50 start-50 translate-middle">
            <div class="d-flex w-100 justify-content-end pt-2 pe-2">
            <svg xmlns="http://www.w3.org/2000/svg" onclick="closeName()" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16" style="cursor: pointer;">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
            </div>
                <form class="p-4 pt-0 d-flex flex-column formBox" style="min-width: 300px;" method="post" action="./booking.php?id=<?php echo $rid;?>">    
                    <div class="mb-2 d-flex flex-column justify-content-between">
                    <label>Name</label>
                    <input type="text" name="name" class="mt-1 mb-3">
                    <label>Mobile No.</label>
                    <input type="number" name="mobile" class="mt-1 mb-3">
                    <label>Number of persons</label>
                    <input type="number" name="person" class="mt-1 mb-3">
                    <label>Check in date</label>
                    <input type="date" name="checkIn" class="mt-1 mb-3">
                    <label>Check out date</label>
                    <input type="date" name="checkOut" class="mt-1 mb-3">
                    <button type="submit" class=" btn btn-primary col-8 my-2" style="max-width:200px;">Book</button>
                    </div>
                </form>
            </div>`;
        }
        else{
            <?php echo "window.location.href='http://localhost/WT-Project/login.php'";?>
        }
    }
</script>
</html>