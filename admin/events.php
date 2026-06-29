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

<title>Coming Soon</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h1>Coming Soon</h1>

<p>This page is under development.</p>

<a href="dashboard.php">
Back to Dashboard
</a>

</div>

</body>

</html>