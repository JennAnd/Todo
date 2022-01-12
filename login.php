<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<h1>Login</h1>
<!--Form for log in.-->
<form action="app/users/login.php" method="post">
    <div class="mb-3">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="jennifer@jenn.com" required>
        <small class="form-text">Please provide the your email address.</small>
    </div>

    <div class="mb-3">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" required>
        <small class="form-text">Please provide the your password (passphrase).</small>
    </div>
    <button type="submit" class="login-button">Login</button>
</form>

<?php require __DIR__ . '/views/footer.php'; ?>