<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//hhh//

if (isset($_POST['title'], $_POST['description'], $_POST['deadline'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
    $taskID = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


    $statement = $database->prepare("UPDATE tasks SET title = :title, description = :description, deadline = :deadline WHERE id = :id");
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':id', $taskID, PDO::PARAM_INT);

    $statement->execute();

    $_SESSION['user'][] = $statement->fetch(PDO::FETCH_ASSOC);
}
redirect('/../../create.php');
