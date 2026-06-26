<?php
include 'db.php';

$nem = 55;
$durum = "NORMAL";
$su = "200ml Su Ekleyin";
$boy = 18;

$sql = "INSERT INTO olcumler(nem,durum,su_miktari,bitki_boyu)
VALUES('$nem','$durum','$su','$boy')";

mysqli_query($conn, $sql);

echo "Veri Eklendi";
?>