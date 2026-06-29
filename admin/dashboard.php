<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h1>Welcome</h1>

<h2><?php echo $_SESSION['fullname']; ?></h2>

<p>Role:
<b><?php echo $_SESSION['role']; ?></b>
</p>

<hr>

<h3>Admin Dashboard</h3>

<ul>

<li>
<a href="create_event.php">
Create Event
</a>
</li>

<li>
<a href="../student_events.php">
Student Event Registration
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
<a href="../logout.php">
Logout
</a>
</li>

</ul>

</div>

</body>

</html>