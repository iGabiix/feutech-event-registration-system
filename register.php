<?php
include("config/database.php");

$message = "";

if(isset($_POST['register'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password != $confirm_password){
        $message = "Passwords do not match!";
    } else {

        $sql = "INSERT INTO users(fullname,email,password)
                VALUES('$fullname','$email','$password')";

        if(mysqli_query($conn,$sql)){
            $message = "Registration Successful!";
        } else {
            $message = "Error: " . mysqli_error($conn);
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

    <p><?php echo $message; ?></p>

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