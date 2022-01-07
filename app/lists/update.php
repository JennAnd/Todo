<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//hhh//

if (isset($_POST['title'], $_POST['list_id'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));

    $listId = filter_var($_POST['list_id'], FILTER_SANITIZE_NUMBER_INT);


    $statement = $database->prepare("UPDATE lists SET title = :title WHERE list_id = :list_id");
    $statement->bindParam(':title', $title, PDO::PARAM_STR);

    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);

    $statement->execute();
}
redirect('/../../create.php');
