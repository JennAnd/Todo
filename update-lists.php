<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php

if (isset($_POST['list_id'])) {
    $listId = filter_var($_POST['list_id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = $database->prepare('SELECT * FROM lists WHERE id = :id');
    $sql->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $sql->execute();
    $updateLists = $sql->fetch(PDO::FETCH_ASSOC);
}
?>
<form action="/app/lists/update.php" method="post" enctype="multipart/form-data">
    <h2>Edit list</h2>
    <div class="mb-3">

        <label for="task">Title</label>
        <input class="form-control" type="name" name="title" id="title" value="<?= $updateLists['title'] ?>" required>
        <small class="form-text">Edit title</small>
        <input type="hidden" name="id" value="<?= $updateLists['id'] ?>" />
        <?php var_dump($updateLists); ?>
    </div>
    <button class="button">Edit list</button>


    </div>

    <?php require __DIR__ . '/views/footer.php'; ?>