<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if ($_POST['changePassword'] !== $_POST['confPassword']) {
    echo "Your passwords did not match.";
    /* header("Location: /../../profile.php");*/
    exit();
};



if (isset($_POST['changePassword'])) {

    $changePassword = password_hash($_POST['changePassword'], PASSWORD_DEFAULT);


    $insertSQL = ("UPDATE users SET password = :password WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':password', $changePassword, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();
    $_SESSION['changePassword'] = "Your new password was successfully uploaded!";
};

redirect('/profile.php');
