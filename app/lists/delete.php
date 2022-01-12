<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//Delete specific lists and task from list with taskID. Connected to form in file create.php//
if (isset($_POST['id'])) {
    $list = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = $database->prepare('DELETE FROM lists WHERE id = :id');
    $sql->bindParam(':id', $list, PDO::PARAM_INT);
    $sql->execute();

    $sql = $database->prepare('DELETE FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $list, PDO::PARAM_INT);
    $sql->execute();
}

redirect('/../../create.php');
