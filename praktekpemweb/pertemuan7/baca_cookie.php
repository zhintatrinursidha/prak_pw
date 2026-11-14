<?php
if(isset ($_COOKIE['username'])) {
    echo "eh " . htmlspecialchars($_COOKIE['username']);
} else {
    echo "Cookie Belum tersedia";
}
?>

<br>

<a href="hapus_cookie.php">Hapus Cookie</a>