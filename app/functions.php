<?php

declare(strict_types=1);



function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function viewLists(PDO $database): array
{
    $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();

    $viewLists = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $viewLists;
}

function fetchTasks(PDO $database, int $listId): array
{
    $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $listId, PDO::PARAM_INT);
    $sql->execute();
    $tasks =  $sql->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}


function getTasks(PDO $database): array
{
    $sql = $database->prepare('SELECT * tasks, lists.title FROM tasks INNER JOIN lists ON tasks.list_id = lists.id WHERE lists.user_id = :id AND list_id = :list_id');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $sql->execute();

    $getAllTasks = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $getAllTasks;
}
