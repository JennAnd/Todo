<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>">
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




<?php
$lists = viewLists($database);
foreach ($lists as $list) :

?>


    <h3><?= $list['title']; ?></h3>

    <form action="/app/tasks/delete.php" method="POST">
        <input type="hidden" name="id" value="<?= $updateLists['id'] ?>" />
        <button class="button" type="submit">X</button>
    </form>



    <form action="/update-lists.php" method="POST">
        <input type="hidden" name="id" value="<?= $updateLists['id'] ?>" />
        <button class="button">✎</button>
    </form>


    <table>
        <tr class="column-wrapper">
            <th class="column-title">Completed</th>

            <th class="column-title">Title</th>
            <th class="column-title">Description</th>
            <th class="column-title">Deadline</th>
            <th class="column-title">Edit</th>
            <th class="column-title">Delete</th>
        </tr>

        <?php $tasks = fetchTasks($database, $list['id']);
        foreach ($tasks as $taskFetch) :
        ?>
            <tr>
                <td>
                    <form action="/app/tasks/update.php" method="POST">
                        <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>" />
                        <input type="checkbox" name="checkBox" value="">
                        <button type="submit" name="submitCheckBox">check</button>
                    </form>
                </td>

                <td><?php echo $taskFetch['title']; ?></td>
                <td><?php echo $taskFetch['description']; ?></td>
                <td><?php echo $taskFetch['deadline']; ?></td>

                <td>
                    <section>

                        <form action="/update-tasks.php" method="POST">
                            <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>" />
                            <button type="submit">✎</button>
                        </form>
                    </section>
                </td>
                <td>
                    <section>
                        <form action="/app/tasks/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>" />
                            <button type="submit">X</button>
                        </form>
                    </section>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

    <!--jkjkjkj-->

    <details>
        <summary>Add new task</summary>
        <form action="/app/tasks/create.php" method="post" enctype="multipart/form-data">
            <h2>Add task</h2>
            <input type="hidden" name="list_id" value="<?= $list['id']; ?>">
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

                <button type="submit" class="task-button">Add task</button>
            </div>


        </form>
    </details>


    </table>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>