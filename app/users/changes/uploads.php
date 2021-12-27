<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

// add users uploaded images in 'uploads' and in database
if (isset($_FILES['profile_image'])) {
    //saving image in filesystem
    $image = trim(filter_var($_FILES['profile_image']['name'], FILTER_SANITIZE_STRING));

    $endFile =  __DIR__ . '/../../uploads/' . $image;
    $imageTemp = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($imageTemp, $endFile);
    $message = 'The file is uploaded';

    // Adds a row in database
    $insertSQL = ("UPDATE users SET profile_image = :profile_image WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':profile_image', $image, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $sql = $database->prepare('SELECT * FROM users WHERE id = :id');

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
};



redirect('/index.php');