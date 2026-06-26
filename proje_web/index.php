<?php
session_start();
if(!isset($_SESSION['oturum'])) header("Location: login.php");
include 'db.php';

// En son nem verisi
$nemSorgu = mysqli_query($conn, "SELECT * FROM olcumler ORDER BY id DESC LIMIT 1");
$nemVeri = mysqli_fetch_assoc($nemSorgu);
$nem = $nemVeri['nem'] ?? 45;

// Bitki seçimi (Varsayılan Kaktüs)
$bitkiID = $_GET['bitki'] ?? 1;
$bitkiSorgu = mysqli_query($conn, "SELECT * FROM bitkiler WHERE id=$bitkiID");
$bitki = mysqli_fetch_assoc($bitkiSorgu);

// Su hesaplama (Basit Algoritma)
$suGereksinimi = 0;
if($nem < $bitki['ideal_nem']) {
    $suGereksinimi = ($bitki['ideal_nem'] - $nem) * 10; // Örn: Her %1 fark için 10ml
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>AgroVision Pro | Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; margin: 0; display: flex; }
        .sidebar { width: 300px; height: 100vh; background: #1b3022; color: white; padding: 25px; box-sizing: border-box; }
        .main { flex: 1; padding: 30px; }
        .card { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 20px; border-top: 5px solid #2d5a27; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .plant-btn { display: block; width: 100%; padding: 10px; margin: 5px 0; background: #2d5a27; color: white; text-decoration: none; border-radius: 5px; text-align: center; }
        .plant-btn:hover { background: #45a049; }
        .status-pill { padding: 5px 15px; border-radius: 20px; color: white; font-weight: bold; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>AgroVision Pro</h2>
    <p><i class="fa fa-user"></i> Hoş geldin, Admin</p>
    <hr>
    <h3>Bitki Kütüphanesi</h3>
    <?php
    $tumBitkiler = mysqli_query($conn, "SELECT id, ad FROM bitkiler");
    while($b = mysqli_fetch_assoc($tumBitkiler)){
        echo "<a href='?bitki={$b['id']}' class='plant-btn'>{$b['ad']}</a>";
    }
    ?>
    <hr>
    <a href="logout.php" style="color: #ff7675; text-decoration:none; font-weight:bold;">Güvenli Çıkış</a>
</div>

<div class="main">
    <div class="grid">
        <div class="card">
            <h3><i class="fa fa-info-circle"></i> <?php echo $bitki['ad']; ?> Bakım Rehberi</h3>
            <p><b>İdeal Nem:</b> %<?php echo $bitki['ideal_nem']; ?></p>
            <p><b>Ortam:</b> <?php echo $bitki['ortam']; ?></p>
            <p><b>Özet:</b> <?php echo $bitki['bilgi']; ?></p>
            <p><b>Sulama Sıklığı:</b> <?php echo $bitki['sulama_gun']; ?> Günde 1</p>
        </div>

        <div class="card" style="text-align: center;">
            <h3>Anlık Nem İbresi</h3>
            <h1 style="font-size: 64px; color: #2d5a27; margin: 10px 0;">%<?php echo $nem; ?></h1>
            <span class="status-pill" style="background: <?php echo ($nem < $bitki['ideal_nem']) ? '#e17055' : '#2ecc71'; ?>">
                <?php echo ($nem < $bitki['ideal_nem']) ? "SU GEREKLİ" : "DURUM İYİ"; ?>
            </span>
            <h4 style="margin-top:20px; color:#555;">Tavsiye: <span style="color:#2d5a27;"><?php echo $suGereksinimi; ?>ml</span> Su Ekleyin.</h4>
        </div>
    </div>

    <div class="card">
        <h3><i class="fa fa-chart-area"></i> 24 Saatlik Nem Analizi</h3>
        <canvas id="analizChart" style="height: 250px;"></canvas>
    </div>
</div>

<script>
    new Chart(document.getElementById('analizChart'), {
        type: 'line',
        data: {
            labels: ['00:00', '06:00', '12:00', '18:00', '22:00'],
            datasets: [{
                label: 'Nem Seviyesi %',
                data: [35, 42, 38, 55, <?php echo $nem; ?>],
                borderColor: '#2d5a27',
                backgroundColor: 'rgba(45, 90, 39, 0.1)',
                fill: true,
                tension: 0.3
            }]
        }
    });
</script>
</body>
</html>