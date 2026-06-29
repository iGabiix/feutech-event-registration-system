<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("config/database.php");

$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Available Events</title>

<link rel="stylesheet" href="assets/css/style.css">

<style>

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

table,th,td{
border:1px solid #ccc;
}

th,td{
padding:10px;
text-align:center;
}

th{
background:green;
color:white;
}

.register-btn{
background:green;
color:white;
padding:8px 15px;
border-radius:5px;
text-decoration:none;
}

</style>

</head>

<body>

<div class="container" style="width:1000px;">

<h2>Available Events</h2>

<table>

<tr>

<th>Event</th>
<th>Description</th>
<th>Date</th>
<th>Location</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['event_name']; ?></td>

<td><?php echo $row['description']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['location']; ?></td>

<td>

<a
class="register-btn"
href="register_event.php?id=<?php echo $row['event_id']; ?>">
Register
</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="admin/dashboard.php">
← Back to Dashboard
</a>

</div>

</body>

</html>