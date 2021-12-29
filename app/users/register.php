<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


//Skapa funktioner i mina issets istället//

if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confPassword'])) {
    $name = trim(filter_var(($_POST['name']), FILTER_SANITIZE_STRING));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confPassword = password_hash($_POST['confPassword'], PASSWORD_DEFAULT);


    $statement = $database->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    $statement->execute();
}


redirect('/');
