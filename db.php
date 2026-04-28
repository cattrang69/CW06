<?php
$host = "localhost";
$user = "dle46";
$pass = "Lazyasian091202>"; //might not be the correct password
$db   = "dle46";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}
?>