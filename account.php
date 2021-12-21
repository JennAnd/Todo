<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<article>
    <h5>Not yet a member?</h5><br>
    <h5>Create an account</h5>

    <form action="app/users/register.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="email" valuer="name" required>
            <small class="form-text">Please provide your name.</small>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="francis@darjeeling.com" required>
            <small class="form-text">Please provide your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide the your password (passphrase).</small>
        </div>




        <button type="submit" class="account-button">Sign up</button>

    </form>
</article>