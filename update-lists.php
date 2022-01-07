<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php

if (isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = $database->prepare('SELECT * FROM lists WHERE id = :id');
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $updateLists = $sql->fetch(PDO::FETCH_ASSOC);
}
?>
<form action="/app/lists/update.php" method="post" enctype="multipart/form-data">
    <h2>Edit list</h2>
    <div class="mb-3">

        <label for="task">Title</label>
        <input type="hidden" name="id" value="<?= $updateLists['id'] ?>" />
        <input class="form-control" name="title" value="<?= $updateLists['title'] ?>" required>
        <small class="form-text">Edit title</small>


    </div>
    <button class="button">Edit list</button>


    </div>

    <?php require __DIR__ . '/views/footer.php'; ?>