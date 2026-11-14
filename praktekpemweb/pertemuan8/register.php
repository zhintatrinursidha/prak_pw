<?php

include 'koneksi.php';
if (isset($_POST['register'])){
    $name = $_POST ['name'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    

    //mengubah passwors menjadi hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //mengecek email apakah sudah digunakan atau belum
    $check = mysqli_prepare(
        $conn,
        "SELECT id FROM users WHERE email = ?"
    );

    mysqli_stmt_bind_param($check, 's', $email);
    mysqli_stmt_execute($check);

    $result = mysqli_stmt_get_result($check);

    if(mysqli_num_rows($result) > 0){
        echo "Email sudah terdaftar";
    } else {
        $query = mysqli_prepare (
            $conn,
            "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
        );
        mysqli_stmt_bind_param($query, 'sss', $name, $email, $hashedPassword);

    if(mysqli_stmt_execute($query)){
        echo "Register Berhasil Silakan Login";
    } else {
        echo "Register Gagal";
    }
}
}
?>

<h2>Register</h2>
<form method = "POST">
    <input type = 'text' name = "name" placeholder = "Nama Lengkap" required>
    <br>
    <br>

    <input type = 'text' name = "email" placeholder = "Email" required>
    <br>
    <br>

    <input type = 'text' name = "password" placeholder = "Password" required>
    <br>
    <br>

    <button type = 'submit' name = "register" >
        Register
    </button>
</form>

<p> sudah punya akun? <a href = "login.php">Login</a></p>