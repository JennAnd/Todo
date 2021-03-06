<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


//Change the right users password. Connects with update.php//
if (isset($_POST['changePassword'])) {
    $changePassword = password_hash($_POST['changePassword'], PASSWORD_DEFAULT);


    if ($_POST['changePassword'] !== $_POST['confPassword']) {
        $_SESSION['errorMessage'] = "Passwords did not match. Please try again!";
        redirect('/update.php');
    }


    //Success message if password changed correctly.//
    if (strlen($changePassword) < 16) {
        $_SESSION['errorMessage'] = "Password must be at least 16 characters long!";
        redirect('/update.php');
    }


    $insertSQL = ("UPDATE users SET password = :password WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':password', $changePassword, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['successMessage'] = "Your new password was successfully changed!";
    redirect("/update.php");
}


redirect('/profile.php');
