<?php 
$host = "localhost";
$user = "jtz12";
$password = "4040271";
$dbname = "jtz12";
$connect = mysqli_connect($host, $user, $password, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>