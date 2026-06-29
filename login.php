<?php
session_start();
include("config/database.php");

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        if($password == $user['password']){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            header("Location: admin/dashboard.php");
            exit();

        }else{
            $message = "Incorrect password!";
        }

    }else{
        $message = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Login</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<label>Email</label>

<input type="email" name="email" required>

<label>Password</label>

<input type="password" name="password" required>

<button type="submit" name="login">
Login
</button>

</form>

<br>

<a href="register.php">
Create an account
</a>

</div>

</body>

</html>