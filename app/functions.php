<?php

declare(strict_types=1);



function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}




//hhh//

function fetchListsById(PDO $database): array
{
    $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();

    $viewLists = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $viewLists;
}




//hhh//

function fetchTasksById(PDO $database, int $listId): array
{
    $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $listId, PDO::PARAM_INT);
    $sql->execute();
    $tasks =  $sql->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}




//hhh//

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
