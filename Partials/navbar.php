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
                    <ul class="navbar-nav justify-content-evenly mx-auto mb-2 mb-lg-0 fs-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./search.php">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./About.xml">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Contact</a>
                        </li>
                    </ul>
                    <a class="btn btn-warning rounded-pill me-3" href="./search.php" role="button">Book Room</a>';

                        if ($login) {
                            echo '<a class="btn btn-warning rounded-pill" href="./logout.php" role="button">Logout</a>';
                        }
                        else{
                            echo '<a class="btn btn-warning rounded-pill" href="./login.php" role="button">Login / SignUp</a>';
                        }
                    
                echo '</div>
            </div>
        </nav>
    </header>';
?>