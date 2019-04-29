<?php
    $database_servername = "localhost";
    $database_username = "root";
    $database_password = "";
    $database_name = "compare";
    $conn = new mysqli($database_servername, $database_username, $database_password, $database_name) or die("Error: " . mysqli_error($conn));
    $conn->query("SET character_set_results=utf8");
    $conn->query("SET character_set_client=utf8");
    $conn->query("SET character_set_connection=utf8");
?>    