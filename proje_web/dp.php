<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "topraknem";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("Veritabani baglantisi basarisiz!");
}

?>