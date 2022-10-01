<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style=" background-position: center; background-size: 100%; background-image: url(img/bglogin.jpg)">
    <div class="zan-login">
        <div class="isi-login">

            <div class="isi-left">
                <img src="img/logohs.png" alt="">
                <p>Hospital</p>
                
            </div>

            <div class="dokicon">
                <img src="img/dokicon.png" alt="">
            </div>
            
            <p class="judul-login">Login</p>
            
            <div class="isi-right">
            <form action="" method="post">
                <label for=""><img src="img/nameicon.png" alt=""></label>
                <input type="text" name="email" placeholder="Email...">
                <br>
                <label for=""><img src="img/passicon.png" alt="" style="height: 25px;"></label>
                <input type="password" name="pass" placeholder="Password"> 
                <br>
                <input type="submit" name="login" value="Login">
                <!-- <a href="" type ="submit" name="login" value="login"><button>Login</button></a> -->
            </form>
                <!-- dont have account -->
                <br>
                <div class="dont-login">
                <label for="">Don’t have an account?</label>
                <a href="regis.html">Sign Up</a>
                </div>
            </div>
            
        </div>
    </div>
    <?php
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $data_user = mysqli_query($connect, "SELECT * FROM data_akun WHERE email = '$email' AND password = '$pass'");
        $r = mysqli_fetch_array($data_user);
        $email = $r['email'];
        $password = $r['password'];
        $status = $r['status'];
        if($r['status']=='admin'){
            $_SESSION['email'] = $email;
            $_SESSION['status'] = 'admin';
            header('location:/last-project/html/index.html');
        }else{
            header("location:login.php?pesan=gagal");
        }
    }
    ?>
</body>

</html> 