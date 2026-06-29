<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

if($_SESSION['role'] != "admin"){
    header("Location: ../student_events.php");
    exit();
}

include("../config/database.php");

// Total Users
$userQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$totalUsers = mysqli_fetch_assoc($userQuery)['total'];

// Total Events
$eventQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM events");
$totalEvents = mysqli_fetch_assoc($eventQuery)['total'];

// Total Registrations
$registrationQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM registrations");
$totalRegistrations = mysqli_fetch_assoc($registrationQuery)['total'];

?>

<!DOCTYPE html>

<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="../assets/css/style.css">

<style>

.cards{
    display:flex;
    justify-content:space-between;
    gap:20px;
    margin:30px 0;
}

.card{
    flex:1;
    background:green;
    color:white;
    text-align:center;
    padding:25px;
    border-radius:10px;
}

.card h1{
    margin:0;
    font-size:42px;
}

.card p{
    margin-top:10px;
    font-size:18px;
}

ul{
    list-style:none;
    padding:0;
}

ul li{
    margin:15px 0;
}

ul li a{
    text-decoration:none;
    font-size:18px;
}

</style>

</head>

<body>

<div class="container" style="width:1000px;">

<h1>Welcome</h1>

<h2><?php echo $_SESSION['fullname']; ?></h2>

<p>

Role:
<b><?php echo ucfirst($_SESSION['role']); ?></b>

</p>

<div class="cards">

<div class="card">
<h1><?php echo $totalUsers; ?></h1>
<p>Total Users</p>
</div>

<div class="card">
<h1><?php echo $totalEvents; ?></h1>
<p>Total Events</p>
</div>

<div class="card">
<h1><?php echo $totalRegistrations; ?></h1>
<p>Total Registrations</p>
</div>

</div>

<hr>

<h3>Admin Dashboard</h3>

<ul>

<li>
<a href="create_event.php">
Create Event
</a>
</li>

<li>
<a href="events.php">
Manage Events
</a>
</li>

<li>
<a href="registrations.php">
View Registrations
</a>
</li>

<li>
<a href="../student_events.php">
Student Event Registration
</a>
</li>

<li>
<a href="../my_registrations.php">
My Registrations
</a>
</li>

<li>
<a href="../logout.php">
Logout
</a>
</li>

</ul>

</div>

</body>

</html>