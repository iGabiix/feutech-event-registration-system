<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config/database.php");

$message = "";
$messageType = "";

if(isset($_POST['register'])){

    $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Check if email already exists
    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){

        $message = "Email already exists.";
        $messageType = "error";

    }
    elseif($password != $confirm_password){

        $message = "Passwords do not match.";
        $messageType = "error";

    }else{

        // Plain text password for now
        // Later we will change this to password_hash()

        $sql = "INSERT INTO users(fullname,email,password)
                VALUES('$fullname','$email','$password')";

        if(mysqli_query($conn,$sql)){

            $message = "Registration successful! You may now login.";
            $messageType = "success";

        }else{

            $message = "Database Error: ".mysqli_error($conn);
            $messageType = "error";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Create Account | FEU Event Registration System</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="container auth-box">

<h1 class="auth-title">

FEU Event Registration System

</h1>

<h2 class="auth-subtitle">

Create Account

</h2>

<?php if($message!=""){ ?>

<div
style="
padding:12px;
margin-bottom:20px;
border-radius:8px;
text-align:center;
font-weight:bold;

<?php
if($messageType=="success"){
echo "background:#d4edda;color:#155724;";
}else{
echo "background:#ffe5e5;color:#b00020;";
}
?>
">

<?php echo $message; ?>

</div>

<?php } ?>

<form method="POST">

<label>Full Name</label>

<input
type="text"
name="fullname"
placeholder="Enter your full name"
required>

<label>Email Address</label>

<input
type="email"
name="email"
placeholder="Enter your email address"
required>

<label>Password</label>

<input
type="password"
name="password"
placeholder="Enter your password"
required>

<label>Confirm Password</label>

<input
type="password"
name="confirm_password"
placeholder="Confirm your password"
required>

<button
type="submit"
name="register">

Create Account

</button>

</form>

<div class="auth-footer">

<p>

Already have an account?

</p>

<br>

<a class="btn"
href="login.php">

Login Here

</a>

</div>

</div>

</body>

</html>