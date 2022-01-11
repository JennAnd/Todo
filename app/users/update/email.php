<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['changeEmail'])) {
    $changeEmail = trim(filter_var($_POST['changeEmail'], FILTER_VALIDATE_EMAIL));

    $insertSQL = ("UPDATE users SET email = :email WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':email', $changeEmail, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();
    $_SESSION['changeEmail'] = "Your new email address was successfully uploaded!";
};

redirect('/update.php');
