<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//hhh//

if (isset($_POST['title'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $sql = $database->prepare("INSERT INTO lists (title, user_id) VALUES (:list, :user_id)");

    $sql->bindParam(':list', $title, PDO::PARAM_STR);
    $sql->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['user'][] = $sql->fetch(PDO::FETCH_ASSOC);
}

redirect('/../../create.php');
