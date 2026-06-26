<?php

include "baglanti.php";

$nem = rand(0, 100);

if ($nem < 30) {
    $durum = "KURU";
    $su = "Su Ver";
}
elseif ($nem > 80) {
    $durum = "COK ISLAK";
    $su = "Su Verme";
}
else {
    $durum = "IDEAL";
    $su = "Normal";
}

$sql = "INSERT INTO olcumler
(nem_yuzde, durum, su_onerisi)
VALUES
('$nem', '$durum', '$su')";

if ($baglanti->query($sql)) {
    echo "Veri kaydedildi.";
} else {
    echo "Hata: " . $baglanti->error;
}

$baglanti->close();

?>