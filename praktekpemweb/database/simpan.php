<?php
include "pert5.php";

$username = $_POST['username'];
$jurusan = $_POST['jurusan'];

$query = mysqli_prepare(
    $conn,
    "INSERT INTO mahasiswa (username, jurusan)
    VALUES (?, ?)"
);

mysqli_stmt_bind_param($query, "ss", $username, $jurusan);

if (mysqli_stmt_execute($query)) {
    echo "Data berhasil disimpan";
    echo "<br> Selamat Datang, ";
    echo htmlspecialchars($username);
    echo "<br> Jurusan: ";
    echo htmlspecialchars($jurusan);
    echo "<br> <a href='index.php'>Lihat Data</a>";
} else {
    echo "Gagal Menyimpan Data";
}

?>