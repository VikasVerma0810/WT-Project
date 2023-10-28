<?php
// Retrieve data from the database and return it as JSON


header("Access-Control-Allow-Origin: *");


header('Content-Type: application/json');

// Connect to the database and query the table
    require "../config/config.php"; 
    // require "./connection.php";
    if (isset($_GET['location'])) {
        $location = $_GET['location'];
        $query = $conn->query("SELECT * FROM resortinfo where location like '%".$location."%'");
    }
    else{
        $query = $conn->query('SELECT * FROM resortinfo');
    }
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
?>
