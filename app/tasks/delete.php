<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['id'])) {
    $taskID = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = $database->prepare('DELETE * FROM tasks WHERE id = :id');
    $sql->bindParam(':id', $taskID, PDO::PARAM_INT);
    $sql->execute();
}

redirect('/../../create.php');
