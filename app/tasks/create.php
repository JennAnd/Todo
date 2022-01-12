<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


////Connects user tasks with database. Connected to form in file create.php.////
if (isset($_POST['title'], $_POST['description'], $_POST['deadline'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
    $listId = filter_var($_POST['list_id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = $_SESSION['user']['id'];


    $statement = $database->prepare("INSERT INTO tasks (title, description, deadline, list_id, user_id) VALUES (:title, :description, :deadline, :list_id, :user_id)");
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $listId, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_STR);

    $statement->execute();
    $_SESSION['user'][] = $statement->fetch(PDO::FETCH_ASSOC);
}

redirect('/../../create.php');
