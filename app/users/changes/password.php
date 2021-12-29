<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';





if (isset($_POST['changePassword'])) {

    $changePassword = password_hash($_POST['changePassword'], PASSWORD_DEFAULT);


    $insertSQL = ("UPDATE users SET password = :password WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':password', $changePassword, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();
};

if ($_POST['changePassword'] === $_POST['confPassword']) {
    $_SESSION['successMessage'] = "Your new password was successfully uploaded!";
    header("location: /../../profile.php");
    exit();
};

if ($_POST['changePassword'] !== $_POST['confPassword']) {
    $_SESSION['errorMessage'] = "Passwords did not match. Please try again!";
    header("location: /../../profile.php");
    exit();
};



redirect('/profile.php');
