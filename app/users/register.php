<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['profile_image'])) {
    $image = $_FILES['profile_image'];
    $place = __DIR__ . '/../uploads/' . date("y-m-d") . $image['name'];
    move_uploaded_file($image['tmp_name'], $point);
    //$message = 'The file was successfully uploaded!';//
}
//Skapa funktioner i mina issets istället//

if (isset($_POST['name'])) {
    $name = trim(filter_var(($_POST['name']), FILTER_SANITIZE_STRING));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $image = $_FILES['profile-image'];



    $statement = $database->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    // $statement->bindParam(':profile_image', $image, PDO::PARAM_STR);//
    $statement->execute();



    if ($image['type'] !== 'image/png') {
        echo 'Ops ';
    } else {
        echo 'Welcome!';
    }


    $database->exec("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
}
//redirect('/');//
