<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/database.php");

$message = "";

if(isset($_POST['create_event'])){

    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];

    $sql = "INSERT INTO events(event_name, description, event_date, location)
            VALUES('$event_name','$description','$event_date','$location')";

    if(mysqli_query($conn,$sql)){
        $message = "Event created successfully!";
    }else{
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Create Event</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Create Event</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<label>Event Name</label>
<input type="text" name="event_name" required>

<label>Description</label>
<textarea name="description" rows="5" required></textarea>

<label>Event Date</label>
<input type="date" name="event_date" required>

<label>Location</label>
<input type="text" name="location" required>

<button type="submit" name="create_event">
Create Event
</button>

</form>

<br>

<a href="dashboard.php">
← Back to Dashboard
</a>

</div>

</body>

</html>