<?php
session_start();
include("config/database.php");

$message = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){

        $user = mysqli_fetch_assoc($result);

        if($password==$user['password']){

            $_SESSION['user_id']=$user['id'];
            $_SESSION['fullname']=$user['fullname'];
            $_SESSION['role']=$user['role'];

            if($user['role']=="admin"){
                header("Location: admin/dashboard.php");
            }else{
                header("Location: student_dashboard.php");
            }

            exit();

        }else{

            $message="Incorrect password.";

        }

    }else{

        $message="Email not found.";

    }

}
?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | FEU Event Registration System</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

<div class="auth-box">

<h1 class="auth-title">

FEU Event Registration System

</h1>

<h2 class="auth-subtitle">

Welcome Back

</h2>

<?php if($message!=""){ ?>

<div class="error">

<?php echo $message; ?>

</div>

<?php } ?>

<form method="POST">

<label>Email Address</label>

<input
type="email"
name="email"
placeholder="Enter your email address"
autocomplete="email"
required>

<label>Password</label>

<input
type="password"
name="password"
placeholder="Enter your password"
autocomplete="current-password"
required>

<button
type="submit"
name="login">

Login

</button>

</form>

<div class="auth-footer">

<p>

Don't have an account?

</p>

<a class="btn" href="register.php">

Create Account

</a>

</div>

</div>

</div>

</body>

</html>