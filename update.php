<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['user']['profile_image'])) :
?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>">
<?php endif;
?>
<h2>Edit you profile</h2><br>
<form action="/app/users/update/uploads.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="profile_image">Choose your profile picture to upload</label><br>
        <input type="file" accept=".jpg, .jpeg, .png" name="profile_image" id="profile_image" required>
        <small class="form-text"> Formats accepted: jpg, jpeg or png. </small>
        <button type="submit" class="button">Change profile picture</button>

    </div>
    <div class="success-message">
        <?php
        if (isset($_SESSION['profile_image'])) :
            echo $_SESSION['profile_image'];
            unset($_SESSION['profile_image']);



        endif; ?>
    </div>

</form><br>


<form action="app/users/update/email.php" method="post">
    <div class="mb-3">
        <label for="changeEmail">Change your email address</label>
        <input class="form-control" type="email" name="changeEmail" id="changeEmail" placeholder="jennifer@jenn.com" required>
        <small class="form-text">Please provide your new email address.</small>
        <button type="submit" class="button">Update your new email</button>
        <div class="success-message">
            <?php if (isset($_SESSION['changeEmail'])) :
                echo $_SESSION['changeEmail'];
                unset($_SESSION['changeEmail']);

                if (isset($_SESSION['user']['changeEmail'])) :
                endif;
            endif; ?>
        </div>
    </div>

</form><br>

<form action="app/users/update/password.php" method="post">
    <div class="mb-3">
        <label for="password">New password</label>
        <input class="form-control" type="password" name="changePassword" id="changePassword" required>
        <small class="form-text">Please provide your new password (passphrase).</small>

    </div>
    <div class="success-message">
        <?php if (isset($_SESSION['successMessage'])) :
            echo $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);

            if (isset($_SESSION['user']['successMessage'])) :
            endif;
        endif;
        ?>
    </div>
    <br>
    <div class="mb-3">
        <label for="password">Confirm password</label>
        <input class="form-control" type="password" name="confPassword" id="confPassword" required>
        <small class="form-text">Please confirm your new password (passphrase).</small>
        <button type="submit" class="button">Update your new password</button>
    </div>
    <div class="error-message">
        <?php if (isset($_SESSION['errorMessage'])) :
            echo $_SESSION['errorMessage'];
            unset($_SESSION['errorMessage']);


        endif;
        ?>
    </div>
</form>
<?php require __DIR__ . '/views/footer.php'; ?>