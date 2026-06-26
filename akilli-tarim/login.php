<?php
session_start();
include 'db.php';
if($_POST){
    $user = $_POST['user']; $pass = $_POST['pass'];
    $sorgu = mysqli_query($conn, "SELECT * FROM kullanicilar WHERE kullanici_adi='$user' AND sifre='$pass'");
    if(mysqli_num_rows($sorgu) > 0){
        $_SESSION['oturum'] = true;
        $_SESSION['kullanici'] = $user;
        header("Location: index.php");
    } else { $hata = "Hatalı kullanıcı adı veya şifre!"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>AgroVision | Giriş</title>
    <style>
        body { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; font-family: 'Segoe UI', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); text-align: center; width: 350px; }
        h2 { color: #2d5a27; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #2d5a27; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        button:hover { background: #1e3d1a; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>AgroVision Giriş</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Kullanıcı Adı" required>
            <input type="password" name="pass" placeholder="Şifre" required>
            <button type="submit">Sisteme Bağlan</button>
            <?php if(isset($hata)) echo "<p style='color:red'>$hata</p>"; ?>
        </form>
    </div>
</body>
</html>