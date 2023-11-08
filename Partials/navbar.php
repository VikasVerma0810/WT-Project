<?php
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
    }
    else{
        $login = false;
    }
?>
<?php
    echo '<header class="position-sticky start-0 top-0">
        <nav class="navbar navbar-expand-lg " data-bs-theme="dark">
            <div class="container-fluid" style="width: 90%;">
                <a class="navbar-brand fs-2" href="#"><strong>Resort</strong></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="locations navbar-nav justify-content-evenly mx-auto mb-2 mb-lg-0 fs-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./search.php">Resort</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./About.php">About</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="#footer">Contact</a>
                        </li>
                    </ul>
                    <a class="btn btn-warning rounded-pill me-3" style="background-color:#ff7200 !important;" href="./search.php" role="button">Book Resort</a>';

                        if ($login) {
                            echo '<a href="./myProfile.php" style="background-color:#ff7200 !important;" class="btn btn-outline-success bg-warning rounded-pill ms-2" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" class="text-black" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                            </a>';
                        }
                        else{
                            echo '<a class="btn btn-warning rounded-pill" style="background-color:#ff7200 !important;" href="./login.php" role="button">Login / SignUp</a>';
                        }
                    
                echo '</div>
            </div>
        </nav>
    </header>';
?>