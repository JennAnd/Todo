<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//hhh//



if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $isCompleted = isset($_POST['completed']);

    if ($isCompleted) {
        $checkBox = 1;
    } else {
        $checkBox = 0;
    }

    $statement = $database->prepare("UPDATE tasks SET completed = :completed WHERE id = :id");

    $statement->bindParam(':completed', $checkBox, PDO::PARAM_BOOL);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}



redirect('/../../deadlines-today.php');
