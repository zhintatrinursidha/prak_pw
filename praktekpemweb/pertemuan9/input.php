<?php
    include "koneksi.php";

    $nama = $_POST["name"];
    $description = $_POST["description"];

    $stmt = $koneksi->prepare (
        "INSERT INTO categories (CategoryName, Description) VALUES (?, ?)"
    );
    $stmt->bind_param("ss", $nama, $description);

    if($stmt->execute()) {
        header ("Location: tampil.php");
    } else {
        echo "Gagal menyimpan data" . $koneksi->error;
    }
?>