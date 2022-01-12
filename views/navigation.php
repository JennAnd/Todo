<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
        </li>

        <!--If user is logged in, the profile image displays.-->
        <?php if (isset($_SESSION['user'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/update.php' ? 'active' : ''; ?>" href="/update.php">Edit your profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/deadlines-today.php' ? 'active' : ''; ?>" href="/deadlines-today.php">Todays deadlines</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/create.php' ? 'active' : ''; ?>" href="/create.php">Create list</a>
            </li>
            <!--If you are not logged in you can only view the link Sign in and Create an account in the navigation bar.-->
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="/login.php">Sign in</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/register.php' ? 'active' : ''; ?>" href="/register.php">Create an account</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>