<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<!--If user is logged in, the profile image displays.-->
<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>" alt="users profile picture">
<?php endif; ?>

<h1><?php echo $config['title']; ?></h1>

<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!
    <p>It's time to organize your life! <br>Choose between the links in the navigation bar.</p>
<?php else : ?>
    <br>
    <p>Welcome to To-Do!<br> Create an account or log in to start making your To-Do list.</p>
    <img class="home-image" src="/assets/images/todo.jpg" alt="coffee and list on a table">
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>