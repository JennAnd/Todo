<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';


?>
<article>
    <h2>Not yet a member?</h2><br>
    <h3>Create an account</h3>

    <form action="app/users/register.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="email" value="name" required>
            <small class="form-text">Please provide an account name of your choice.</small>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="jennifer@jenn.com" required>
            <small class="form-text">Please provide your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide your password (passphrase).</small>
        </div>


        <div class="mb-3">
            <label for="password">Confirm password</label>
            <input class="form-control" type="password" name="confPassword" id="confPassword" required>
            <small class="form-text">Please confirm your password (passphrase).</small>
            <button type="submit" class="button">Sign up</button>
        </div>
        <div class="error-message">
            <?php if (isset($_SESSION['errorMessage'])) :
                echo  $_SESSION['errorMessage'];
                unset($_SESSION['errorMessage']);


            endif;
            ?>
        </div>




    </form>
</article>