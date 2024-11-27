<?php
    session_start();
    
    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "codecircle";

    $conn = mysqli_connect("$severname", "$username", "$password", "$database");

    if (!$conn) {
        die("Connection failed! " . mysqli_connect_error());
    }
?>