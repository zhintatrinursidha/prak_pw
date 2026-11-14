<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Pertemuan 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php
    $nama= "Zhinta";
    $semester= 3;

    echo "Halo nama saya $nama";
    ?>
    <br>
    <?php
    echo "Saya asekarang semester $semester";
    ?>
    <br>
    <?php 
    if($semester <= 4) {
        echo "Masih Junior";
    } else {
        echo "Sudah senior";
    }
    ?>
    <br>
    <?php 
    if($semester%2 == 0) {
        ?>
        <button type="button" class="btn btn-danger">Genap</button>
        <?php
    } else {
        ?>
        <button type="button" class="btn btn-success">Ganjil</button>
        <?php
    }
    ?>
    
</body>
</html>