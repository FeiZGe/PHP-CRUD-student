<?php
$servername = "localhost";
$db_name = "u299560388_651223";
$username = "u299560388_651223";
$password = "FN9996Ph";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>