<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    move_uploaded_file($avatar['tmp_name'], __DIR__ . '/../assets/images/' . date("Y-m-d H:i:s") . 'avatar.png');
}

// To add a users name, not sanitized, ändra allt här nedan(//)
if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['avatar'];

    // Text saying if uploaded image was succefull

    if ($image['type'] !== 'image/png') {
        echo 'Ops something went wrong, perhaps the image file type is not allowed.';
    } else {
        echo 'Welcome you are now a member and can start orgonizing your life!';
    }


    $database->prepare("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')"); //
}
//redirect('/');//
