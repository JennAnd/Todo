<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


if (isset($_POST['title'], $_POST['description'], $_POST['deadline'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));



    $statement = $database->prepare("INSERT INTO tasks (title, description, deadline) VALUES (:title, :description, :deadline)");
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);

    // FIX ÄVEN I TASK.php
    $statement->execute();
    $_SESSION['createTask'] = "Your task was successfully created!";
}
redirect('/task.php');
