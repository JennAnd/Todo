<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['id'])) {
    $list = filter_var($_POST['list'], FILTER_SANITIZE_NUMBER_INT);


    $sql = $database->prepare('DELETE FROM tasks WHERE list = :list');
    $sql->bindParam(':list', $list, PDO::PARAM_INT);
    $sql->execute();
}

redirect('/../../create.php');
