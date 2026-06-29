<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/database.php");

$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Events</title>

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

th,td{
    padding:10px;
    text-align:center;
}

th{
    background:green;
    color:white;
}

.action-btn{
    text-decoration:none;
    padding:5px 10px;
    border-radius:5px;
    color:white;
}

.edit{
    background:#007bff;
}

.delete{
    background:#dc3545;
}

</style>

</head>

<body>

<div class="container" style="width:900px;">

<h2>Manage Events</h2>

<table>

<tr>

<th>ID</th>

<th>Event Name</th>

<th>Date</th>

<th>Location</th>

<th>Actions</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['event_id']; ?></td>

<td><?php echo $row['event_name']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['location']; ?></td>

<td>

<a class="action-btn edit"
href="edit_event.php?id=<?php echo $row['event_id']; ?>">
Edit
</a>

<a class="action-btn delete"
href="delete_event.php?id=<?php echo $row['event_id']; ?>">
Delete
</a>

</td>

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