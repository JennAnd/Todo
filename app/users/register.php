<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


//Register new user in to database.//
if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confPassword'])) {
    $name = trim(filter_var(($_POST['name']), FILTER_SANITIZE_STRING));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    //Matching password and confirm password. If not the same, display error message.//
    if ($_POST['password'] !== $_POST['confPassword']) {
        $_SESSION['errorMessage'] = "Passwords did not match. Please try again!";
        redirect("/register.php");
    }

    //Password need to be at least 16 characters long.//
    if (strlen($password) < 16) {
        $_SESSION['errorMessage'] = "Password must be at least 16 characters long!";
        redirect("/register.php");
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $statement = $database->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    $statement->execute();
}


redirect('/');
