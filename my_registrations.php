<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("config/database.php");

$user_id = $_SESSION['user_id'];

$sql = "
SELECT
registrations.registration_id,
events.event_name,
events.description,
events.event_date,
events.location,
registrations.registration_date

FROM registrations

INNER JOIN events
ON registrations.event_id = events.event_id

WHERE registrations.user_id='$user_id'

ORDER BY events.event_date ASC
";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>My Registrations</title>

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

th{
    background:green;
    color:white;
}

th,td{
    padding:12px;
    text-align:center;
}

.btn{
    padding:8px 15px;
    border-radius:5px;
    text-decoration:none;
    color:white;
}

.cancel{
    background:#dc3545;
}

.back{
    display:inline-block;
    margin-top:20px;
    background:green;
    color:white;
    padding:10px 20px;
    border-radius:5px;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="container" style="width:1100px;">

<h2>My Registered Events</h2>

<table>

<tr>

<th>Event</th>
<th>Description</th>
<th>Date</th>
<th>Location</th>
<th>Registered At</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['event_name']; ?></td>

<td><?php echo $row['description']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['registration_date']; ?></td>

<td>

<a
class="btn cancel"
href="cancel_registration.php?id=<?php echo $row['registration_id']; ?>"
onclick="return confirm('Cancel this registration?');">

Cancel

</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a class="back" href="student_dashboard.php">
← Back to Dashboard

</a>

</div>

</body>

</html>