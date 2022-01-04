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
