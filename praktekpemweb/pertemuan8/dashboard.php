<?php
session_start();

if(!isset($_SESSION['login']) || ($_SESSION['login'] != true)){
    header("Location: login.php");
    exit();
}

?>
<h1> Selamat Datang, <?php echo htmlspecialchars($_SESSION['name']); ?> </h1>
<p> kamu berhasil login ke dashboard </p>

<a href = "logout.php">Logout</a>