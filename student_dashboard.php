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

$result = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM registrations
WHERE user_id='$user_id'");

$totalRegistered = mysqli_fetch_assoc($result)['total'];

$result = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM events");

$totalEvents = mysqli_fetch_assoc($result)['total'];

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

<style>

.cards{
display:flex;
gap:20px;
margin:30px 0;
}

.card{
flex:1;
background:green;
color:white;
padding:25px;
text-align:center;
border-radius:10px;
}

.card h1{
margin:0;
font-size:42px;
}

.card p{
font-size:20px;
margin-top:10px;
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

<h1>Welcome Student</h1>

<h2><?php echo $_SESSION['fullname']; ?></h2>

<p>

Role:
<b><?php echo ucfirst($_SESSION['role']); ?></b>

</p>

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

<hr>

<h3>Student Dashboard</h3>

<ul>

<li>

<a href="student_events.php">

Browse Events

</a>

</li>

<li>

<a href="my_registrations.php">

My Registrations

</a>

</li>

<li>

<a href="logout.php">

Logout

</a>

</li>

</ul>

</div>

</body>

</html>