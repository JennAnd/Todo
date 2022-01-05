<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['title'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $sql = $database->prepare("INSERT INTO lists (title, user_id) VALUES (:list, :user_id)");

    $sql->bindParam(':list', $title, PDO::PARAM_STR);
    $sql->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['user'][] = $sql->fetch(PDO::FETCH_ASSOC);
}





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
    $_SESSION['user'][] = $sql->fetch(PDO::FETCH_ASSOC);
}
redirect('/task.php');
