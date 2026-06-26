<?php
include "baglanti.php";

$sonuclar = $baglanti->query("
    SELECT * FROM olcumler
    ORDER BY tarih DESC
");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Olcum Gecmisi</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            padding:30px;
        }

        h1{
            text-align:center;
            color:#2e7d32;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        th, td{
            border:1px solid #ddd;
            padding:12px;
            text-align:center;
        }

        th{
            background:#2e7d32;
            color:white;
        }

        tr:nth-child(even){
            background:#f2f2f2;
        }

    </style>

</head>

<body>

<h1>🌱 Toprak Nem Olcum Gecmisi</h1>

<table>

    <tr>
        <th>ID</th>
        <th>Nem (%)</th>
        <th>Durum</th>
        <th>Su Onerisi</th>
        <th>Tarih</th>
    </tr>

    <?php while($satir = $sonuclar->fetch_assoc()) { ?>

    <tr>
        <td><?= $satir["id"] ?></td>
        <td>%<?= $satir["nem_yuzde"] ?></td>
        <td><?= $satir["durum"] ?></td>
        <td><?= $satir["su_onerisi"] ?></td>
        <td><?= $satir["tarih"] ?></td>
    </tr>

    <?php } ?>

</table>

</body>
</html>