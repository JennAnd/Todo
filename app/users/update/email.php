<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

//Change the right users email. Connects with update.php//
if (isset($_POST['changeEmail'])) {
    $changeEmail = trim(filter_var($_POST['changeEmail'], FILTER_VALIDATE_EMAIL));

    $insertSQL = ("UPDATE users SET email = :email WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':email', $changeEmail, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();
    //Success message if email changed correctly.//
    $_SESSION['changeEmail'] = "Your new email address was successfully changed!";
};

redirect('/update.php');
