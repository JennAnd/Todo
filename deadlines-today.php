<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!--Fetched a function from functions.php with a loop to fetch tasks with deadline today.-->
<?php $taskDeadlines = taskDeadlineToday($database); ?>

<!--If user is logged in, the profile image displays.-->
<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>" alt="users profile picture">
<?php endif; ?>

<h2>Todays deadlines</h2><br>

<div class="deadline-container">
    <table>
        <tr class="column-wrapper">
            <th class="column-title">Completed</th>
            <th class="column-title">Title</th>
            <th class="column-title">Description</th>
            <th class="column-title">Deadline</th>
            <th class="column-title">Edit</th>
            <th class="column-title">Delete</th>
        </tr>

        <tr>
            <!--Loop from function with tasks with deadlines today and display them.-->
            <?php foreach ($taskDeadlines as $taskDeadline) : ?>
                <td>
                    <form class="completed-tasks" action="/app/tasks/deadlines-today.php" method="POST">
                        <input type="hidden" name="id" value="<?= $taskDeadline['id'] ?>">
                        <input type="checkbox" name="completed" id="completed" <?= $taskDeadline['completed'] ? 'checked' : '' ?>>
                        <label for="completed">
                        </label>
                    </form>
                </td>

                <td><?php echo $taskDeadline['title']; ?></td>
                <td><?php echo $taskDeadline['description']; ?></td>
                <td><?php echo $taskDeadline['deadline']; ?></td>

                <td>
                    <form action="/update-tasks.php" method="POST">
                        <input type="hidden" name="id" value="<?= $taskDeadline['id'] ?>" />
                        <button type="submit">✎</button>
                    </form>
                </td>

                <td>
                    <form action="/app/tasks/delete.php" method="POST">
                        <input type="hidden" name="id" value="<?= $taskDeadline['id'] ?>" />
                        <button type="submit">X</button>
                    </form>
                </td>
            <?php endforeach; ?>
        </tr>
</div>
</table>

<?php require __DIR__ . '/views/footer.php'; ?>