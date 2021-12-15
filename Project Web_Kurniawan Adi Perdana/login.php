<?php
session_start();
include 'function.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM admin WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $row['$username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("location:admin1.php");
    exit;
}


if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $psw = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$uname' AND password = md5('$psw')");
    $row = mysqli_fetch_assoc($query);
    $cek = mysqli_num_rows($query);
    if ($cek == 1) {
        $_SESSION['login'] = true;

        //cek cookie
        if (isset($_POST['remember'])) {
            setcookie('id', $row['id'], time() + 60);
            setcookie('key', hash('sha256', $row['username']), time() + 60);
        }
        header("location:admin1.php");
        exit;
    } else {
        echo "<script>
                alert('Username & Password Salah');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <title>login admin</title>
</head>

<body>
    <form action="" method="post" class="login-div">
        <div class="logo"></div>
        <div class="title">Scholar.co</div>
        <div class="sub-title">Admin</div>
        <div class="fields">
            <div class="username">
                <i class="fas fa-user ml-2" style="color: dodgerblue;"></i><input type="text" name="username" id="username" placeholder="Username">
            </div>

            <div class="password">
                <i class="fas fa-key ml-2" style="color: dodgerblue;"></i><input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="remember">
                <input type="checkbox" name="remember">
                <label for="remember">Remember me</label>
            </div>
        </div>
        <button type="submit" name="login" class="signin-button"><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
    </form>
</body>

</html>