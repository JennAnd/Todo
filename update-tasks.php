<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php

if (isset($_POST['id'])) {
    $taskID = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = $database->prepare('SELECT * FROM tasks WHERE id = :id');
    $sql->bindParam(':id', $taskID, PDO::PARAM_INT);
    $sql->execute();
    $updateTasks = $sql->fetch(PDO::FETCH_ASSOC);
}
?>

<form action="/app/tasks/update.php" method="post" enctype="multipart/form-data">
    <h2>Edit task</h2>
    <div class="mb-3">
        <label for="task">Title</label>
        <input class="form-control" type="title" name="title" id="title" value="<?= $updateTasks['title'] ?>" required>
        <small class="form-text">Edit title</small>
        <input type="hidden" name="id" value="<?= $updateTasks['id'] ?>" />
    </div>

    <div class="mb-3">
        <label for="description">Description</label>
        <input class="form-control" type="description" name="description" id="description" value="<?= $updateTasks['description'] ?>" required>
        <small class="form-text">Edit description</small>
        <input type="hidden" name="id" value="<?= $updateTasks['id'] ?>" />
    </div>

    <div class="mb-3">
        <label for="deadline">Deadline</label>
        <input class="form-control" type="date" name="deadline" id="deadline" value="<?= $updateTasks['deadline'] ?>" required>
        <small class="form-text">Choose date</small>
        <input type="hidden" name="id" value="<?= $updateTasks['id'] ?>" />
        <button type="submit" class="button">Confirm changes</button>
    </div>
</form>
<?php require __DIR__ . '/views/footer.php'; ?>