<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM events WHERE event_id='$id'";
$result = mysqli_query($conn,$sql);
$event = mysqli_fetch_assoc($result);

$message = "";

if(isset($_POST['update_event'])){

    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];

    $update = "UPDATE events SET

    event_name='$event_name',
    description='$description',
    event_date='$event_date',
    location='$location'

    WHERE event_id='$id'";

    if(mysqli_query($conn,$update)){
        header("Location: events.php");
        exit();
    }else{
        $message = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Event</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Edit Event</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<label>Event Name</label>

<input
type="text"
name="event_name"
value="<?php echo $event['event_name']; ?>"
required>

<label>Description</label>

<textarea
name="description"
required><?php echo $event['description']; ?></textarea>

<label>Event Date</label>

<input
type="date"
name="event_date"
value="<?php echo $event['event_date']; ?>"
required>

<label>Location</label>

<input
type="text"
name="location"
value="<?php echo $event['location']; ?>"
required>

<button
type="submit"
name="update_event">

Update Event

</button>

</form>

<br>

<a href="events.php">

← Back

</a>

</div>

</body>

</html>