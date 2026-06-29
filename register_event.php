<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("config/database.php");

$user_id = $_SESSION['user_id'];
$event_id = $_GET['id'];

$check = "SELECT * FROM registrations
WHERE user_id='$user_id'
AND event_id='$event_id'";

$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result)>0){

    echo "<script>
    alert('You are already registered.');
    window.location='student_events.php';
    </script>";

    exit();
}

$sql = "INSERT INTO registrations(user_id,event_id)
VALUES('$user_id','$event_id')";

if(mysqli_query($conn,$sql)){

    echo "<script>
    alert('Registration Successful!');
    window.location='student_events.php';
    </script>";

}else{

    echo mysqli_error($conn);

}
?>