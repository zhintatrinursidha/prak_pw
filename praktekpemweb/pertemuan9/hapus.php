<?php
include "koneksi.php";

$id = $_GET["id"];
$stmt = $koneksi->prepare(
    "DELETE FROM categories WHERE CategoryID = ?"
);

$stmt->bind_param("i", $id);

if($stmt->execute()) {
        header ("Location: tampil.php");
    } else {
        echo "Gagal menghapus data" . $koneksi->error;
    }
?>