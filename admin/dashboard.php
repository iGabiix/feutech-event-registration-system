<body>

<div class="container">

    <h1 class="auth-title">
        FEU Event Registration System
    </h1>

    <h2 class="auth-subtitle">
        Admin Portal
    </h2>

    <div class="welcome-card">

        <div class="welcome-icon">

            <i class="fa-solid fa-user-shield"></i>

        </div>

        <div>

            <h2>
                Welcome Back,
                <?php echo $_SESSION['fullname']; ?>
            </h2>

            <p>
                Logged in as
                <strong>
                    <?php echo ucfirst($_SESSION['role']); ?>
                </strong>
            </p>

        </div>

    </div>

    <h2 class="section-title">
        Dashboard Overview
    </h2>

    <div class="cards">

        <div class="card">

            <i class="fa-solid fa-users dashboard-icon"></i>

            <h1><?php echo $totalUsers; ?></h1>

            <p>Total Users</p>

        </div>

        <div class="card">

            <i class="fa-solid fa-calendar-days dashboard-icon"></i>

            <h1><?php echo $totalEvents; ?></h1>

            <p>Total Events</p>

        </div>

        <div class="card">

            <i class="fa-solid fa-clipboard-list dashboard-icon"></i>

            <h1><?php echo $totalRegistrations; ?></h1>

            <p>Total Registrations</p>

        </div>

    </div>

    <h2 class="section-title">
        Quick Actions
    </h2>

    <div class="action-grid">

        <!-- Create Event -->

        <div class="action-card">

            <i class="fa-solid fa-calendar-plus action-icon create-icon"></i>

            <h3>Create Event</h3>

            <p>
                Create new events for students to register.
            </p>

            <a href="create_event.php" class="btn">
                Create Event
            </a>

        </div>

        <!-- Manage Events -->

        <div class="action-card">

            <i class="fa-solid fa-list-check action-icon manage-icon"></i>

            <h3>Manage Events</h3>

            <p>
                Edit or delete existing events.
            </p>

            <a href="events.php" class="btn">
                Manage Events
            </a>

        </div>

        <!-- Registrations -->

        <div class="action-card">

            <i class="fa-solid fa-users-viewfinder action-icon registration-icon"></i>

            <h3>View Registrations</h3>

            <p>
                View all student registrations.
            </p>

            <a href="registrations.php" class="btn">
                View Registrations
            </a>

        </div>

        <!-- Student Events -->

        <div class="action-card">

            <i class="fa-solid fa-user-graduate action-icon student-icon"></i>

            <h3>Student Events</h3>

            <p>
                Open the student event registration page.
            </p>

            <a href="../student_events.php" class="btn">
                Student Events
            </a>

        </div>

        <!-- My Registrations -->

        <div class="action-card">

            <i class="fa-solid fa-file-signature action-icon file-icon"></i>

            <h3>My Registrations</h3>

            <p>
                View your personal registrations.
            </p>

            <a href="../my_registrations.php" class="btn">
                My Registrations
            </a>

        </div>

        <!-- Logout -->

        <div class="action-card">

            <i class="fa-solid fa-right-from-bracket action-icon logout-icon"></i>

            <h3>Logout</h3>

            <p>
                Securely sign out of your administrator account.
            </p>

            <a href="../logout.php" class="btn btn-danger">
                Logout
            </a>

        </div>

    </div>

</div>

</body>