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
    <section>

        <h3><?= $list['title']; ?></h3><button class="button">Delete list</button>
        <table>
            <tr class="column-wrapper">
                <th class="column-title">Completed</th>
                <th class="column-title">List<?= $list['title']; ?></th>
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
                            <button type="submit" name="submitCheckBox">Completed</button>
                        </form>
                    </td>
                    <td><?= $list['title']; ?></td>
                    <td><?php echo $taskFetch['title']; ?></td>
                    <td><?php echo $taskFetch['description']; ?></td>
                    <td><?php echo $taskFetch['deadline']; ?></td>

                    <td>
                        <section>

                            <form action="/app/tasks/update.php" method="POST">
                                <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>" />
                                <button type="submit"></button>
                            </form>
                        </section>
                    </td>
                    <td>
                        <section>
                            <form action="/app/tasks/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?= $taskFetch['id'] ?>" />
                                <button type="submit"></button>
                            </form>
                        </section>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>






        <details>
            <summary>Add new task</summary>
            <form action="/app/tasks/update.php" method="post" enctype="multipart/form-data">
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
                    <button type="submit" class="task-button">Add task</button>
                </div>


            </form>
        </details>


        <details>
            <summary>Edit task</summary>
            <form action="/app/tasks/update.php" method="post" enctype="multipart/form-data">
                <h2>Edit task</h2>
                <div class="mb-3">

                    <label for="task">Title</label>
                    <input class="form-control" type="title" name="title" id="title" value="<?= $updateTasks['title'] ?>" required>
                    <small class="form-text">Edit title</small>
                    <input type="hidden" name="id" value="<?= $updateTasks['id'] ?>" />

                </div>

                <div class="mb-3">

                    <label for="description">Description</label>
                    <input class="form-control" type="description" name="description" id="description" value="<?= $updateTasks['description'] ?>" required>
                    <small class="form-text">Edit description</small>
                    <input type="hidden" name="id" value="<?= $updateTasks['id'] ?>" />

                </div>


                <div class="mb-3">

                    <label for="deadline">Deadline</label>
                    <input class="form-control" type="date" name="deadline" id="deadline" value="<?= $updateTasks['deadline'] ?>" required>
                    <small class="form-text">Choose date</small>
                    <input type="hidden" name="id" value="<?= $updateTasks['id'] ?>" />
                    <button type="submit" class="button">Confirm changes</button>
                </div>


            </form>
        </details>
        </table>
    <?php endforeach; ?>

    <?php require __DIR__ . '/views/footer.php'; ?>