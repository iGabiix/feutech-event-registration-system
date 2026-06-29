<?php
session_start();
include("config/database.php");

$message = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){

        $user = mysqli_fetch_assoc($result);

        // Plain text password (current setup)
        if($password == $user['password']){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if($user['role'] == "admin"){
                header("Location: admin/dashboard.php");
            }else{
                header("Location: student_dashboard.php");
            }

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

    <title>FEU Event Registration System</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

    <h1>FEU Event Registration System</h1>

    <h2>Login</h2>

    <?php if($message != ""){ ?>
        <p style="color:red; font-weight:bold;">
            <?php echo $message; ?>
        </p>
    <?php } ?>

    <form method="POST">

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="Enter your email"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter your password"
            required
        >

        <button
            type="submit"
            name="login">
            Login
        </button>

    </form>

    <br>

    <p>
        Don't have an account?
        <a href="register.php">Register Here</a>
    </p>

</div>

</body>

</html>