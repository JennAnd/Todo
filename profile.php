<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<h2>Edit you profile</h2><br>
<form action="/app/users/changes/uploads.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="avatar">Choose your profile picture to upload</label><br>
        <input type="file" accept=".jpg, .jpeg, .png" name="avatar" id="avatar" required>
        <small class="form-text"> Formats accepted: jpg, jpeg or png. </small>
        <button type="submit" class="button">Change profile picture</button>
    </div>

</form>

<form action="app/users/changes/email.php" method="post">
    <div class="mb-3">
        <label for="changeEmail">Change your email address</label>
        <input class="form-control" type="email" name="changeEmail" id="changeEmail" placeholder="francis@darjeeling.com" required>
        <small class="form-text">Please provide your new email address.</small>
        <button type="submit" class="button">Update your new email</button>
    </div>
</form>

<form action="app/users/changes/password.php" method="post">
    <div class="mb-3">
        <label for="password">New password</label>
        <input class="form-control" type="password" name="changePassword" id="changePassword" required>
        <small class="form-text">Please provide your new password (passphrase).</small>
    </div>

    <div class="mb-3">
        <label for="password">Confirm password</label>
        <input class="form-control" type="password" name="confPassword" id="confPassword" required>
        <small class="form-text">Please confirm your new password (passphrase).</small>
        <button type="submit" class="button">Update your new password</button>
    </div>
</form>
<?php require __DIR__ . '/views/footer.php'; ?>