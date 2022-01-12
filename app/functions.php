<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


//A function to fetch lists, connected with the right user and display them. Connected to file create.php.//
function fetchListsById(PDO $database): array
{
    $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();

    $viewLists = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $viewLists;
}


//A function to fetch tasks, connected with the right list and display them. Connected to file create.php.//
function fetchTasksById(PDO $database, int $listId): array
{
    $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $listId, PDO::PARAM_INT);
    $sql->execute();
    $tasks =  $sql->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}


//A function to fetch tasks with deadline today and display them. Connected to file deadlines-today..php.//
function taskDeadlineToday(PDO $database): array
{
    $date = date('Y-m-d');
    $statement = $database->prepare('SELECT * FROM tasks WHERE deadline = :deadline AND user_id = :id');
    $statement->bindParam(':deadline', $date, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $statement->execute();
    $taskDeadlines = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $taskDeadlines;
}
