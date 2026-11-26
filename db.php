<?php
$host = "localhost";
$username = "root"; // default in XAMPP
$password = "";     // no password by default
$database = "quizhub"; // your DB name

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>