<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<h2>Edit you profile</h2><br>
<form action="app/users/profile.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="avatar">Choose your profile picture to upload</label><br>
        <input type="file" accept=".jpg, .jpeg, .png" name="avatar" id="avatar" required>
        <small class="form-text"> Formats accepted: jpg, jpeg or png. </small>
    </div>
    <button type="submit" class="button">Change profile picture</button>
</form>
<?php require __DIR__ . '/views/footer.php'; ?>