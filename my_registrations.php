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
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Registrations</title>

<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

.cancel{
    background:#dc3545;
}

.cancel:hover{
    background:#b02a37;
}

</style>

</head>

<body>

<div class="container">

    <h1 class="auth-title">
        FEU Event Registration System
    </h1>

    <h2 class="auth-subtitle">
        My Registrations
    </h2>

    <div class="welcome-card">

        <div class="welcome-icon">

            <i class="fa-solid fa-file-signature"></i>

        </div>

        <div>

            <h2>Registered Events</h2>

            <p>
                View and manage your registered FEU events.
            </p>

        </div>

    </div>

<?php if(mysqli_num_rows($result) > 0){ ?>

    <div class="table-container">

    <table>

        <thead>

            <tr>

                <th>Event</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Registered At</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

        <?php while($row=mysqli_fetch_assoc($result)){ ?>

            <tr>

                <td><?php echo $row['event_name']; ?></td>

                <td><?php echo $row['description']; ?></td>

                <td><?php echo $row['event_date']; ?></td>

                <td><?php echo $row['location']; ?></td>

                <td><?php echo $row['registration_date']; ?></td>

                <td>

                    <a
                    href="cancel_registration.php?id=<?php echo $row['registration_id']; ?>"
                    class="btn btn-danger btn-sm cancel"
                    onclick="return confirm('Cancel this registration?');">

                        Cancel

                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

    </div>

<?php } else { ?>

    <div class="welcome-card">

        <div class="welcome-icon">

            <i class="fa-solid fa-calendar-xmark"></i>

        </div>

        <div>

            <h2>No Registrations Yet</h2>

            <p>
                You haven't registered for any events yet.
            </p>

        </div>

    </div>

    <a href="student_events.php" class="btn">

        Browse Events

    </a>

<?php } ?>

<br><br>

<a href="student_dashboard.php" class="btn">

    <i class="fa-solid fa-arrow-left"></i>

    Back to Dashboard

</a>

</div>

</body>

</html>