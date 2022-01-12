<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!--If user is logged in, the profile image displays.-->
<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>" alt="users profile picture">
<?php endif; ?>

<h2>Create Lists</h2>
<form action="/app/lists/create.php" method="post">
    <div class="mb-3 listForm">
        <label for="title">List name</label>
        <input class="form-control" type="name" name="title" id="title" placeholder="name your list" required>
    </div>
    <button type="submit" name="submit" class="button">Create list</button>
    <br>
</form>

<!--Fetched a function from functions.php with a loop to fetch and display lists.-->
<?php $viewLists = fetchListsById($database);
foreach ($viewLists as $list) : ?>
    <div class="list-container">
        <div class="title-container">
            <div class="title-text">
                <h3><?= $list['title']; ?></h3>
            </div>
            <div class="button-container">
                <form action="/app/lists/delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $list['id'] ?>" />
                    <button class="button" type="submit">X</button>
                </form>

                <form action="/update-lists.php" method="post">
                    <input type="hidden" name="id" value="<?= $list['id'] ?>" />
                    <button class="button">✎</button>
                </form>
            </div>
        </div>

        <table>
            <tr class="column-wrapper">
                <th class="column-title">Completed</th>
                <th class="column-title">Title</th>
                <th class="column-title">Description</th>
                <th class="column-title">Deadline</th>
                <th class="column-title">Edit</th>
                <th class="column-title">Delete</th>
            </tr>

            <!--Fetched a function from functions.php with a loop to fetch and display tasks from the right list.-->
            <?php $tasks = fetchTasksById($database, $list['id']);
            foreach ($tasks as $taskFetch) : ?>
                <td>
                    <form class="completed-tasks" action="/app/tasks/update.php" method="POST">
                        <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>">
                        <input type="checkbox" name="completed" id="completed" <?= $taskFetch['completed'] ? 'checked' : '' ?>>
                        <label for="completed">
                        </label>
                    </form>
                </td>

                <td class="column-info"><?php echo $taskFetch['title']; ?></td>
                <td class="column-info"><?php echo $taskFetch['description']; ?></td>
                <td class="column-info"><?php echo $taskFetch['deadline']; ?></td>
                <td>

                    <form action="/update-tasks.php" method="POST">
                        <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>" />
                        <button type="submit">✎</button>
                    </form>
                </td>

                <td>
                    <form action="/app/tasks/delete.php" method="POST">
                        <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>" />
                        <button type="submit">X</button>
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!--Form when add new tasks to a list.-->
        <details>
            <summary>Add new task</summary>
            <div class="new-list">
                <div class="mb-3">
                    <form action="/app/tasks/create.php" method="post" enctype="multipart/form-data">
                        <h2>Add task</h2>
                        <input type="hidden" name="list_id" value="<?= $list['id']; ?>">
                        <label for="task">Title</label>
                        <input class="form-control" type="title" name="title" id="title" value="name your task" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <input class="form-control" type="description" name="description" id="description" value="describe your task" required>
            </div>

            <div class="mb-3">
                <label for="deadline">Deadline</label>
                <input class="form-control" type="date" name="deadline" id="deadline" value="dd-mm-yyyy" required>
            </div>
            <button type="submit" class="task-button">Add task</button>

    </div>
    </form>
    </details>
    </table>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>