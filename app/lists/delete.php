<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//hhh//

if (isset($_POST['id'])) {
    $list = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = $database->prepare('DELETE FROM lists WHERE id = :id');
    $sql->bindParam(':id', $list, PDO::PARAM_INT);
    $sql->execute();
}

redirect('/../../create.php');
