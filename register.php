<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config/database.php");

$message = "";

if(isset($_POST['register'])){

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if($password != $confirm_password){

        $message = "Passwords do not match!";

    } else {

        $sql = "INSERT INTO users(fullname,email,password)
                VALUES('$fullname','$email','$password')";

        if(mysqli_query($conn, $sql)){

            $message = "Registration Successful!";

        } else {

            $message = "Database Error: " . mysqli_error($conn);

        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

    <h2>Create Account</h2>

    <?php if($message != ""){ ?>
        <p><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST">

        <label>Full Name</label>
        <input type="text" name="fullname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit" name="register">
            Register
        </button>

    </form>

    <br>

    <a href="login.php">Already have an account?</a>

</div>

</body>
</html>