<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<article>
    <h1>Create an account</h1>

    <form action="app/users/register.php" method="post">

        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="email" valuer="name" required>
            <small class="form-text">Please write your name</small>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="francis@darjeeling.com" required>
            <small class="form-text">Please provide the your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide the your password (passphrase).</small>
        </div>
    </form>

    <form action="/" method="post" enctype="multipart/form-data">

        <div>
            <label for="avatar">Choose your profile picture to upload</label>
            <input type="file" accept=".jpg, .jpeg, .png" name="avatar" id="avatar" required>
        </div>

        <button type="submit">Upload</button>


        <button type="submit" class="account-button">Create an account</button>

    </form>
</article>