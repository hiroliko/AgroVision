<?php
session_start();

if(!isset($_SESSION['oturum'])){
header("Location: login.php");
exit;
}

include 'db.php';

// Son nem verisi
$nemSorgu = mysqli_query($conn,"SELECT * FROM olcumler ORDER BY id DESC LIMIT 1");
$nemVeri = mysqli_fetch_assoc($nemSorgu);

$nem = $nemVeri['nem'] ?? 34;

// Bitki seçimi
$bitkiID = $_GET['bitki'] ?? 1;

$bitkiSorgu =
mysqli_query(
$conn,
"SELECT * FROM bitkiler WHERE id=$bitkiID"
);

$bitki = mysqli_fetch_assoc($bitkiSorgu);

// Durum belirleme
if($nem < ($bitki['ideal_nem']-10))
{
$etiket="SU GEREKLI";
$renk="#e17055";

$durum="😢 Durum: KURU";
}
elseif($nem > ($bitki['ideal_nem']+20))
{
$etiket="COK ISLAK";
$renk="#3498db";

$durum="😢 Durum: COK ISLAK";
}
else
{
$etiket="DURUM IYI";
$renk="#2ecc71";

$durum="🙂 Durum: IDEAL";
}

// Grafik
$grafikSorgu=
mysqli_query(
$conn,
"SELECT nem,tarih FROM olcumler ORDER BY id DESC LIMIT 5"
);

$grafikNem=[];
$grafikSaat=[];

while($g=mysqli_fetch_assoc($grafikSorgu))
{
$grafikNem[]=$g["nem"];
$grafikSaat[]=
date(
"H:i",
strtotime($g["tarih"])
);
}

$grafikNem=array_reverse($grafikNem);
$grafikSaat=array_reverse($grafikSaat);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<meta http-equiv="refresh" content="5">
<title>AgroVision Pro</title>

<title>
AgroVision Pro
</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

body{
background:#f0f2f5;
font-family:Segoe UI;
margin:0;
display:flex;
}

.sidebar{
width:300px;
background:#1b3022;
height:100vh;
color:white;
padding:25px;
box-sizing:border-box;
}

.main{
flex:1;
padding:30px;
}

.card{
background:white;
border-radius:15px;
padding:25px;

margin-bottom:20px;

box-shadow:
0 4px 12px
rgba(0,0,0,.1);

border-top:
5px solid #2d5a27;
}

.grid{
display:grid;

grid-template-columns:
1fr 1fr;

gap:20px;
}

.plant-btn{

display:block;

width:100%;

padding:10px;

margin:8px 0;

background:#2d5a27;

color:white;

text-decoration:none;

border-radius:8px;

text-align:center;

}

.status{

display:inline-block;

padding:10px 18px;

border-radius:30px;

color:white;

font-weight:bold;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>
AgroVision Pro
</h2>

<p>
<i class="fa fa-user"></i>
Hoş geldin,
<?php echo $_SESSION['kullanici']; ?>
</p>

<hr>

<h3>
Bitki Kütüphanesi
</h3>

<?php

$tumBitkiler=
mysqli_query(
$conn,
"SELECT * FROM bitkiler"
);

while(
$b=
mysqli_fetch_assoc(
$tumBitkiler
)
)
{

echo "

<a
class='plant-btn'
href='?bitki={$b['id']}'
>

{$b['ad']}

</a>

";

}

?>

<hr>

<a
href="logout.php"
style="
color:pink;
text-decoration:none;
font-weight:bold;
">

Güvenli Çıkış

</a>

</div>

<div class="main">

<div class="grid">

<div class="card">

<h3>

<i class="fa fa-info-circle"></i>

<?= $bitki["ad"] ?>

Bakım Rehberi

</h3>

<p>

<b>İdeal Nem:</b>

%<?= $bitki["ideal_nem"] ?>

</p>

<p>

<b>Ortam:</b>

<?= $bitki["ortam"] ?>

</p>

<p>

<b>Özet:</b>

<?= $bitki["bilgi"] ?>

</p>

<p>

<b>Sulama:</b>

<?= $bitki["sulama_gun"] ?>

Günde 1

</p>

</div>

<div
class="card"

style="
text-align:center;
">

<h3>

Anlık Nem İbresi

</h3>

<h1
style="
font-size:72px;
margin:10px;
">

%<?= $nem ?>

</h1>

<span
class="status"

style="
background:
<?= $renk ?>
">

<?= $etiket ?>

</span>

<h3>

<?= $durum ?>

</h3>

</div>

</div>

<div class="card">

<h3>

<i class="fa fa-chart-area"></i>

Son Ölçümlerin Nem Analizi

</h3>

<canvas id="analizChart"></canvas>

</div>

</div>

<script>

new Chart(
document.getElementById(
"analizChart"
),

{

type:"line",

data:{

labels:
<?= json_encode($grafikSaat) ?>,

datasets:[{

label:
"Nem Seviyesi %",

data:
<?= json_encode($grafikNem) ?>,

borderColor:
"#2d5a27",

backgroundColor:
"rgba(45,90,39,.1)",

fill:true,

tension:.3

}]

}

}

);

</script>

</body>

</html>