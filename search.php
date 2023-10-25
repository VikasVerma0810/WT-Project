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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="filter.css">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&family=Poppins&family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
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
<body style="background-color: #f8f9fa;">
    <?php require "./Partials/navbar.php" ?>
    <section class="hero">
        <div class="hero-content">
            <h1>Find Your Dream Resort</h1>
        </div>
    </section>
    
    <h1 class="centered-title">Our Featured Resort</h1>
    
    <div class="container mt d-flex flex-row justify-content-between">
        <?php require "./filter.php" ?>
        <div class="col col-9">
            <?php
                $count = 0;
                $queryArray = [];
                $sqlResorts = "select * from resortinfo";
                if (isset($_GET['amenities'])) {
                    $Amens = $_GET['amenities'];
                    $resultAmen = explode(',', $Amens);
                    for ($i=0; $i < count($resultAmen); $i++) {
                        $amenName = str_replace(" ", "", $resultAmen[$i]);
                        echo '<script>
                                checkAmen = amenities[0].querySelector(`input[name="'.$amenName.'"]`)
                                checkAmen.checked = true
                            </script>';
                        $amenQuery = " amenities like '%".$resultAmen[$i]."%'";
                        $queryArray[$count] = $amenQuery;
                        $count++;
                    }
                }
                if (isset($_GET['rating'])) {
                    $rating = $_GET['rating'];
                    echo '<script>
                                checkRating = ratings[0].querySelector(`input[name="'.$rating.'"]`)
                                checkRating.checked = true
                            </script>';
                    $queryArray[$count] = " rating>=".$rating."";
                    $count++;
                }
                if (isset($_GET['location'])) {
                    $location = $_GET['location'];
                    $resultloca = explode(',', $location);
                    $queryArray[$count] = " location like '%".$location."%'";
                    $count++;
                }

                if ($count) {
                    $whereClauses = " where";
                    for ($i=0; $i < $count-1; $i++) { 
                        $whereClauses .= $queryArray[$i];
                        $whereClauses .= ' or';
                    }
                    $whereClauses .= $queryArray[$count - 1];
                    $sqlResorts .= $whereClauses;
                    echo $sqlResorts;
                }

                $result = mysqli_query($conn, $sqlResorts);
                $num = mysqli_num_rows($result);
                for ($i=0; $i < $num; $i++) { 
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $name = $row['Name'];
                    $desc = $row['description'];
                    $img = $row['poster'];
                    $price = $row['price'];
                    $location = $row['location'];
                    $discount = $row['discount'];
                    $rating = $row['rating'];
                    $rating = number_format($rating, 1);
                    echo 
                    '<div class="w-100 my-4 shadow">
                        <div class="card card-img d-flex flex-row rounded-2 border-start border-end border-primary border-2" style="border: none;">
                            <img width="250px" height="250px" class="m-3 rounded-2 shadow" src="'.$img.'" alt="Luxury Resort">
                            <div class="col-6 me-3">
                                <h1 class="fs-3 card-title pt-3 fw-bold m-0 text-primary" style="font-family: "Roboto Condensed", sans-serif;">'.$name.'</h2>
                                <div class="">
                                    <svg height="16px" width="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                        viewBox="0 0 47.94 47.94" xml:space="preserve">
                                    <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                        c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                        c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                        c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                        c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                        C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                    </svg>
                                    <svg height="16px" width="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                        viewBox="0 0 47.94 47.94" xml:space="preserve">
                                    <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                        c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                        c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                        c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                        c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                        C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                    </svg>
                                    <svg height="16px" width="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                        viewBox="0 0 47.94 47.94" xml:space="preserve">
                                    <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                        c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                        c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                        c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                        c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                        C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                    </svg>
                                    <svg height="16px" width="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                        viewBox="0 0 47.94 47.94" xml:space="preserve">
                                    <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                        c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                        c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                        c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                        c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                        C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                    </svg>
                                </div>
                                <div class="my-1">
                                    <a href="#" style="font-size:13px;" class="card-description text-info link-underline-primary">'.$location.'</a>
                                    <a href="#" style="font-size:13px;" class="card-description text-info link-underline-primary ms-4">Show on map</a>
                                    <span style="font-size:13px;" class="card-description ms-4">9.9 km from center</span>
                                </div>
                                <div class="attributes mt-4 d-flex flex-row">
                                    <div class="atts text-center mx-2">
                                        <svg width="40px" height="40px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#ffa200" stroke="#ffa200"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ff9500" d="m384.064 274.56.064-50.688A128 128 0 0 1 512.128 96c70.528 0 127.68 57.152 127.68 127.68v50.752A448.192 448.192 0 0 1 955.392 768H68.544A448.192 448.192 0 0 1 384 274.56zM96 832h832a32 32 0 1 1 0 64H96a32 32 0 1 1 0-64zm32-128h768a384 384 0 1 0-768 0zm447.808-448v-32.32a63.68 63.68 0 0 0-63.68-63.68 64 64 0 0 0-64 63.936V256h127.68z"></path></g></svg>
                                        <p class="" style="font-size:13px; margin-bottom:0.5rem;">Meals Included</p>
                                    </div>
                                    <div class="atts text-center mx-2">
                                        <svg width="40px"  height="40px" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="#ffa200"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:none;stroke:#ffa200;stroke-miterlimit:10;stroke-width:1.91px;}</style></defs><line class="cls-1" x1="14.39" y1="20.59" x2="7.7" y2="20.59"></line><path class="cls-1" d="M3.89,20.59H1.5V13.91l.69-4.13a1.92,1.92,0,0,1,1.88-1.6H15.39A1.91,1.91,0,0,1,17.2,9.49l1.48,4.42,3.82,1.91v4.77H18.2"></path><circle class="cls-1" cx="16.3" cy="20.59" r="1.91"></circle><circle class="cls-1" cx="5.8" cy="20.59" r="1.91"></circle><line class="cls-1" x1="18.68" y1="13.91" x2="4.36" y2="13.91"></line><line class="cls-1" x1="12.95" y1="10.09" x2="12.95" y2="13.91"></line><line class="cls-1" x1="7.23" y1="10.09" x2="7.23" y2="13.91"></line><path class="cls-1" d="M5.32,1.5h8.59a2.86,2.86,0,0,1,2.86,2.86v1a0,0,0,0,1,0,0H2.45a0,0,0,0,1,0,0v-1A2.86,2.86,0,0,1,5.32,1.5Z"></path><line class="cls-1" x1="5.32" y1="5.32" x2="5.32" y2="8.18"></line><line class="cls-1" x1="13.91" y1="5.32" x2="13.91" y2="8.18"></line></g></svg>
                                        <p class="" style="font-size:13px; margin-bottom:0.5rem;">Transport Included</p>
                                    </div>
                                    <div class="atts text-center mx-2">
                                        <svg width="60px"  height="40px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffa200"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffa200" d="M157.936 170.44c34.704 30.84 60.676 41.057 64.574 66.86-44.922-28.557-74.454-35.404-120.55-24.94 34.698 15.008 61.532 39.41 61.128 67.585C122.04 252.54 81.49 244.095 33.49 259.37c47.32 15.773 60.156 31.302 45.78 65.935l19.033 7.142-3.033 8.084c38.96-3.31 88.642-9.652 139.994-17.178L200.8 277.4 190 263h84.492l71.46 42.875c2.615-.438 5.27-.877 7.86-1.314-64.466-85.384-102.083-116.213-195.876-134.12zM226 281l33.918 45.223 66.492-11.082L269.508 281H226zm243.992 21.143c-45.566 8.635-116.498 21.22-190.61 32.75-69.577 10.823-139.832 20.412-191.093 24.244l-8.9 23.722L116.815 439H352c26 0 61.605-29.436 88.896-64.525 13.646-17.545 25.395-36.16 33.604-52.096l.234-.468c-77.016 62.68-213.816 84.28-355.404 84.28v-18c144.212 0 281.44-25.07 350.662-86.05zM18 306.088v41.48a79.124 79.124 0 0 1 3.49-6.144c7.413-11.725 18.567-21.03 33.217-23.717-13.384-4.862-25.65-8.858-36.707-11.62zm38.297 29.822c-8.354 2-14.408 6.934-19.592 15.133-5.605 8.866-9.643 21.322-12.275 35.016-4.567 23.75-5.04 49.47-5.996 68.94h8.09l23.85-46.05 24.753-65.973-18.83-7.067zM71.6 403.623l-4.748 12.654L55.084 439h40.1L71.6 403.623zM45.762 457l-8.287 16H18v21h476v-37H45.762z"></path></g></svg>
                                        <p class="" style="font-size:13px; margin-bottom:0.5rem;">Speed Boat</p>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <p>'.$desc.'</p>
                            </div>
                            <div class="border-start my-2 py-3 px-3 w-100 d-flex flex-column justify-content-between">
                                <div class="d-flex flex-row justify-content-between mb-2">
                                    <div class="text-center">
                                        <h5 class="mb-0">Very Good</h6>
                                        <p style="font-size:13px; margin-bottom:0px;">1,200+ reviews</p>
                                    </div>
                                    <div class="my-auto mx-1 p-2 text-light fw-bold rounded-top rounded-end" style="background-color:#001bff">
                                        '.$rating.'
                                    </div>
                                </div>
                                <div class="my-3">
                                    <del class="text-danger">₹ '.$price.'</del>
                                    <p class="fs-4 m-0">₹ '.($price - $price*($discount/100)).'</p>
                                    <p class="text-secondary m-0">Per room</p>
                                </div>
                                <a href="./booking.php?id='.$id.'" class="btn btn-primary w-100">See Availibility &gt;</a>
                            </div>
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
