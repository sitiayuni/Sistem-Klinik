<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "siaku";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

?> 