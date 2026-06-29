<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != "student"){
    header("Location: admin/dashboard.php");
    exit();
}

include("config/database.php");

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM registrations
WHERE user_id='$user_id'");

$totalRegistered = mysqli_fetch_assoc($result)['total'];

$result = mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM events");

$totalEvents = mysqli_fetch_assoc($result)['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

    <h1 class="auth-title">
        FEU Event Registration System
    </h1>

    <h2 class="auth-subtitle">
        Student Dashboard
    </h2>

    <div class="success">

        <strong>Welcome, <?php echo $_SESSION['fullname']; ?>!</strong>

        <br>

        Role:
        <strong><?php echo ucfirst($_SESSION['role']); ?></strong>

    </div>

    <div class="cards">

        <div class="card">

            <h1><?php echo $totalEvents; ?></h1>

            <p>Available Events</p>

        </div>

        <div class="card">

            <h1><?php echo $totalRegistered; ?></h1>

            <p>My Registrations</p>

        </div>

    </div>

    <a href="student_events.php" class="btn">

        Browse Events

    </a>

    <br><br>

    <a href="my_registrations.php" class="btn">

        My Registrations

    </a>

    <br><br>

    <a href="logout.php" class="btn"

       style="background:#dc3545;">

        Logout

    </a>

</div>

</body>

</html>