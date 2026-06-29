<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/database.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM events WHERE event_id='$id'";

    if(mysqli_query($conn,$sql)){
        header("Location: events.php");
        exit();
    }else{
        echo "Error deleting event.";
    }

}else{

    header("Location: events.php");
    exit();

}
?>