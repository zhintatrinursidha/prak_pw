<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil</title>
</head>
<body>
    <h2>Daftar Kategori Produk</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        
        <?php
            include "koneksi.php";
            $query = "SELECT * FROM categories";
            $hasil = $koneksi->query($query);

            while($baris = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td>" . $baris["CategoryID"] . "</td>";
                echo "<td>" . $baris["CategoryName"] . "</td>";
                echo "<td>" . $baris["Description"] . "</td>";
                echo "<td><a href='edit.php?id=" . $baris["CategoryID"] . "'>Edit</a> | <a href='hapus.php?id=" . $baris["CategoryID"] . "'>Hapus</a></td>";
                echo "</tr>";   
            }
        ?>
    </table>
    <br>

    <a href="form.php">Tambah Kategori Baru</a>
    
</body>
</html>