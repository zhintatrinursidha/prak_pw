<?php
$koneksi = mysqli_connect("localhost", "root", "", "nwind");

if($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>