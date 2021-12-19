<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $place = __DIR__ . '/../uploads/' . date("y-m-d") . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], $place);
    $message = 'The file was successfully uploaded!';
}

// To add a users name, not sanitized, ändra allt här nedan(//)
if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['avatar'];



    if ($image['type'] !== 'image/png') {
        echo 'Ops ';
    } else {
        echo 'Welcome!';
    }


    $database->exec("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
}
//redirect('/');//
