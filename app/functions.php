<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


//A function to fetch lists, connected with the right user and display them. Connected to file create.php.//
function fetchListsById(PDO $database): array
{
    $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();

    $viewLists = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $viewLists;
}


//A function to fetch tasks, connected with the right list and display them. Connected to file create.php.//
function fetchTasksById(PDO $database, int $listId): array
{
    $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $listId, PDO::PARAM_INT);
    $sql->execute();
    $tasks =  $sql->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}


//A function to fetch tasks with deadline today and display them. Connected to file deadlines-today..php.//
function taskDeadlineToday(PDO $database): array
{
    $date = date('Y-m-d');
    $statement = $database->prepare('SELECT * FROM tasks WHERE deadline = :deadline AND user_id = :id');
    $statement->bindParam(':deadline', $date, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $statement->execute();
    $taskDeadlines = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $taskDeadlines;
}

//function to get search results
function get_search_results(PDO $database)
{
    $user_id = $_SESSION['user']['id'];
    if (isset($_POST['search'])) {
        $trimmed_search = trim($_POST['search']);
        $sanitized_search = filter_var($trimmed_search, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = "%" . ($sanitized_search) . "%";
        $statement = $database->prepare(
            "SELECT tasks.id, tasks.deadline, tasks.list_id, tasks.title, tasks.user_id, tasks.completed, tasks.description, lists.title
            AS list_title
            FROM tasks
            INNER JOIN lists
            ON tasks.list_id = lists.id
            WHERE tasks.user_id = :user_id
            AND (tasks.title
            LIKE :search
            OR tasks.description
            LIKE :search
            OR list_title
            LIKE :search)"
        );

        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':search', $search, PDO::PARAM_STR);
        $statement->execute();
        $search_result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $search_result;
    }
}
