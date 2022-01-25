<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete'])) {
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['delete'], $user['password'])) {
        $statement = $database->prepare('DELETE FROM tasks WHERE user_id = :user_id');
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM lists WHERE user_id = :user_id');
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        unset($_SESSION['user']);

        redirect('/');
    } else {
        $_SESSION['errorMessage'] = 'Something went wrong. The account was not deleted.';
        redirect('/update.php');
    }
}
