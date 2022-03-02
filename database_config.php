<?php
session_start();
$hostname= "localhost";
$user = "root";
$password= "";
$database = "db_kolka";

$conn = new mysqli($hostname, $user, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>