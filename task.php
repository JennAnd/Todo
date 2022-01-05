<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>">
<?php endif; ?>


<?php

$viewLists = viewLists($database);

?>


<h2>Create Lists</h2>
<form action="/app/users/tasks/tasks.php" method="post">
    <div class="mb-3 listForm">
        <label for="title">List name</label>
        <input class="form-control" type="name" name="title" id="title" placeholder="name your list" required>
    </div>
    <button type="submit" name="submit" class="button">Create list</button>
    <br>

</form>

<?php
$lists = viewLists($database);
foreach ($lists as $list) :

?>
    <table class="list-table">
        <thead>
            <tr>
                <th class="table-text">Lists</th>
            </tr>
        </thead>
        <thead>

            <tr class="column">

                <td><?= $list['title']; ?></td>

                <td><button type="submit" name="submit" class="task-button">View and add tasks</button> </td>



            </tr>

        </thead>


        </form>

        <details>
            <summery>Add new task</summery>
            <form class="hidden-form" action="app/users/tasks/tasks.php" method="post" enctype="multipart/form-data">
                <h2>Add task</h2>
                <div class="mb-3">

                    <label for="task">Title</label>
                    <input class="form-control" type="title" name="title" id="title" value="name your task" required>
                    <small class="form-text">Create a new task</small>

                </div>

                <div class="mb-3">

                    <label for="description">Description</label>
                    <input class="form-control" type="description" name="description" id="description" value="describe your task" required>
                    <small class="form-text">Description</small>

                </div>


                <div class="mb-3">

                    <label for="deadline">Deadline</label>
                    <input class="form-control" type="date" name="deadline" id="deadline" value="dd-mm-yyyy" required>
                    <small class="form-text">Choose date</small>
                    <button type="submit" class="button">Add task</button>
                </div>

                <input type="hidden" name="list_id" value="<?= $list['id']; ?>">
            </form>
        </details>
    </table>
<?php endforeach; ?>
<table class="hidden-tasks">
    <thead>
        <tr>

            <th>Task</th>
            <th>Description</th>
            <th>Deadline</th>
            <th>Edit</th>
            <th>Check</th>
            <th>Delete</th>
        </tr>
    </thead>
    <thead>
        <tr>

            <td class="task"></td>
            <td class="description"></td>
            <td><input type="date" name="deadline"></td>
            <td class="edit"></td>
            <td><input type="checkbox" class="check">
            <td class="delete">
                <a href="#">X</a>
            </td>
        </tr>
    </thead>
</table>

<?php require __DIR__ . '/views/footer.php'; ?>