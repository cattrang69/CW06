<?php
$host = "localhost";
$user = "your_username";
$pass = "your_password";
$db   = "your_username";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}
?>