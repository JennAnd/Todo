<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>" alt="users profile picture">
<?php endif; ?>
<article>
    <h1><?php echo $config['title']; ?></h1>


    <?php if (isset($_SESSION['user'])) : ?>
        <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!
        <p>It's time to organize your life! <br>Choose between the links in the navigation bar.</p>
    <?php endif; ?>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>