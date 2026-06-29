<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/database.php");

$sql = "
SELECT
registrations.registration_id,
users.fullname,
users.email,
events.event_name,
events.event_date,
registrations.registration_date

FROM registrations

INNER JOIN users
ON registrations.user_id = users.id

INNER JOIN events
ON registrations.event_id = events.event_id

ORDER BY registrations.registration_date DESC
";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>View Registrations</title>

<link rel="stylesheet" href="../assets/css/style.css">

<style>

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

table,th,td{
border:1px solid #ccc;
}

th{
background:green;
color:white;
}

th,td{
padding:12px;
text-align:center;
}

</style>

</head>

<body>

<div class="container" style="width:1100px;">

<h2>Student Registrations</h2>

<table>

<tr>

<th>ID</th>

<th>Student</th>

<th>Email</th>

<th>Event</th>

<th>Date</th>

<th>Registered At</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['registration_id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['event_name']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['registration_date']; ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">
← Back to Dashboard
</a>

</div>

</body>

</html>