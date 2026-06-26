<?php

include "db.php";

$nem = $_GET["nem"] ?? 0;
$durum = $_GET["durum"] ?? "Bilinmiyor";

$sql =
"INSERT INTO olcumler(nem,durum)
VALUES('$nem','$durum')";

if(mysqli_query($conn,$sql)){
 echo "OK";
}
else{
 echo "HATA";
}

?>