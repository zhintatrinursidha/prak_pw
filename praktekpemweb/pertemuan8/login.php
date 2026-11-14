<?php
session_start();

include 'koneksi.php';

    if (isset($_POST['login'])){

        $email = $_POST ['email'];
        $password = $_POST ['password'];

    //mengecek user berdasarkan email
    $query = mysqli_prepare(
        $conn,
        "SELECT * FROM users WHERE email = ?"
    );

    mysqli_stmt_bind_param($query, 's', $email);
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        //periksa password
        if(password_verify($password, $user['password'])){
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: dashboard.php");
            exit(); 
        } else {
            echo "Password salah";
        }
    } else {
        echo "email tidak ditemukan";
    }
}
    
?>
<h2>Login</h2>
<form method = "POST">

    <input type = 'text' name = "email" placeholder = "Email" required>
    <br>
    <br>

    <input type = 'text' name = "password" placeholder = "Password" required>
    <br>
    <br>

    <button type = 'submit' name = "login" >
        Login
    </button>
</form>

<p>Belum punya akun? <a href = "register.php">Register</a></p>