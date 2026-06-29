<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("config/database.php");

if(isset($_GET['id'])){

    $registration_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    mysqli_query($conn,"
        DELETE FROM registrations
        WHERE registration_id='$registration_id'
        AND user_id='$user_id'
    ");

}

header("Location: my_registrations.php");
exit();
?>