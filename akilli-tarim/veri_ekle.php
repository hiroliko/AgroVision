<?php
include 'db.php';

$nem = rand(0, 100);

if($nem < 30){
    $durum = "KURU";
    $su = "500ml Su Ekleyin";
}
else if($nem > 80){
    $durum = "COK ISLAK";
    $su = "Su Vermeyin";
}
else{
    $durum = "NORMAL";
    $su = "Su Gerekmez";
}

$bitki_boyu = rand(5, 25);

$sql = "INSERT INTO olcumler(nem, durum, su_miktari, bitki_boyu)
VALUES('$nem', '$durum', '$su', '$bitki_boyu')";

if(mysqli_query($conn, $sql)){
    echo "Veri Eklendi";
} else {
    echo "Hata: " . mysqli_error($conn);
}
?>