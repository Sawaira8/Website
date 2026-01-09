<?php
$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$database   = "quran_store";
$port       = 3307;

$conn = mysqli_connect($servername, $username, $password, $database, $port);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>