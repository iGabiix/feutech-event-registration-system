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

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="container">

    <h1 class="auth-title">
        FEU Event Registration System
    </h1>

    <h2 class="auth-subtitle">
        Student Portal
    </h2>

    <div class="welcome-card">

        <div class="welcome-icon">

            <i class="fa-solid fa-user-graduate"></i>

        </div>

        <div>

            <h2>

                Welcome Back,
                <?php echo $_SESSION['fullname']; ?>

            </h2>

            <p>

                Logged in as
                <strong>
                    <?php echo ucfirst($_SESSION['role']); ?>
                </strong>

            </p>

        </div>

    </div>

    <h2 class="section-title">

        Dashboard Overview

    </h2>

    <div class="cards">

        <div class="card">

            <i class="fa-solid fa-calendar-days dashboard-icon"></i>

            <h1>

                <?php echo $totalEvents; ?>

            </h1>

            <p>

                Available Events

            </p>

        </div>

        <div class="card">

            <i class="fa-solid fa-clipboard-list dashboard-icon"></i>

            <h1>

                <?php echo $totalRegistered; ?>

            </h1>

            <p>

                My Registrations

            </p>

        </div>

    </div>

    <h2 class="section-title">

        Quick Actions

    </h2>

    <div class="action-grid">

        <div class="action-card">

            <i class="fa-solid fa-calendar-check action-icon"></i>

            <h3>

                Browse Events

            </h3>

            <p>

                View all available FEU events and register instantly.

            </p>

            <a
            href="student_events.php"
            class="btn">

                Browse Events

            </a>

        </div>

        <div class="action-card">

            <i class="fa-solid fa-file-signature action-icon"></i>

            <h3>

                My Registrations

            </h3>

            <p>

                View your registered events or cancel registrations.

            </p>

            <a
            href="my_registrations.php"
            class="btn">

                View Registrations

            </a>

        </div>

        <div class="action-card">

            <i class="fa-solid fa-right-from-bracket action-icon logout-icon"></i>

            <h3>

                Logout

            </h3>

            <p>

                Securely sign out of your account.

            </p>

            <a
            href="logout.php"
            class="btn btn-danger">

                Logout

            </a>

        </div>

    </div>

</div>

</body>

</html>