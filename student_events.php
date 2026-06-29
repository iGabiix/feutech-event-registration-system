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
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Available Events</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

    <h1 class="auth-title">
        FEU Event Registration System
    </h1>

    <h2 class="auth-subtitle">
        Available Events
    </h2>

    <table>

        <thead>

            <tr>

                <th>Event</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <tr>

                <td><?php echo $row['event_name']; ?></td>

                <td><?php echo $row['description']; ?></td>

                <td><?php echo $row['event_date']; ?></td>

                <td><?php echo $row['location']; ?></td>

                <td>

                    <a
                    href="register_event.php?id=<?php echo $row['event_id']; ?>"
                    class="btn btn-sm">

                        Register

                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

    <br>

    <a
    href="my_registrations.php"
    class="btn">

        My Registrations

    </a>

    <br><br>

    <a
    href="student_dashboard.php"
    class="btn">

        ← Back to Dashboard

    </a>

</div>

</body>

</html>