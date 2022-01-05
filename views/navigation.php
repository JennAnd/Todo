<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
        </li>

        <li class="nav-item">
            <?php if (isset($_SESSION['user'])) : ?>
                <a class="nav-link" href="/app/users/logout.php">Logout</a>

        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/update.php' ? 'active' : ''; ?>" href="/update.php">Edit your profile</a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/create.php' ? 'active' : ''; ?>" href="/create.php">Create list</a>
        </li>

    <?php else : ?>
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="/login.php">Sign in</a>

        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/register.php' ? 'active' : ''; ?>" href="/register.php">Create an account</a>
        <?php endif; ?>
        </li>

    </ul>
</nav>