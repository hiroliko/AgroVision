<?php
include "baglanti.php";

$sonVeri = $baglanti->query("
    SELECT * FROM olcumler
    ORDER BY id DESC
    LIMIT 1
");

$veri = $sonVeri->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Toprak Nem Takip Sistemi</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            text-align:center;
            margin:0;
            padding:30px;
        }

        .kart{
            max-width:500px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 0 15px rgba(0,0,0,0.15);
        }

        h1{
            color:#2e7d32;
        }

        .deger{
            font-size:60px;
            font-weight:bold;
            color:#1976d2;
        }

        .bilgi{
            font-size:22px;
            margin:15px 0;
        }

    </style>

</head>

<body>

<div class="kart">

    <h1>🌱 Toprak Nem Sistemi</h1>

    <div class="deger">
        %<?= $veri["nem_yuzde"] ?>
    </div>

    <div class="bilgi">
        Durum: <b><?= $veri["durum"] ?></b>
    </div>

    <div class="bilgi">
        Su Önerisi: <b><?= $veri["su_onerisi"] ?></b>
    </div>

    <div class="bilgi">
        Ölçüm Tarihi:
        <br>
        <?= $veri["tarih"] ?>
    </div>

</div>

</body>
</html>