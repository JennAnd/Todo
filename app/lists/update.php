<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//Edit specific list. Connected to file update-lists.php.//
if (isset($_POST['title'], $_POST['id'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $listId = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $database->prepare("UPDATE lists SET title = :title WHERE id = :id");

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/../../create.php');
