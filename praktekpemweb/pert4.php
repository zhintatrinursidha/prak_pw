<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 4</title>
</head>
<body>
    <h1>Pertemuan 4</h1>
    <hr>
    <?php echo "MBG HEBAT <br>" ?>
    <br>
    <?= "MBG SAMA DENGAN" ?>
    <br>
    <hr>

    <?php 
    $nama = "Zhinta";
    $umur = 20;
    $date = date('d F Y H:i:s');
    echo "Halo nama saya: $nama";
    ?>
    <br>
    <?php
    echo "Umur saya: " . ($umur + 1);
    ?>
    <br>
    <?php
    echo "Tanggal Lahir saya: $date";
    ?>
    
</body>
</html>