<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php $taskDeadlines = taskDeadlineToday($database); ?>

<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>" alt="users profile picture">
<?php endif;
?>
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
                    <section>

                        <form action="/update-tasks.php" method="POST">
                            <input type="hidden" name="id" value="<?= $taskDeadline['id'] ?>" />
                            <button type="submit">✎</button>
                        </form>
                    </section>
                </td>
                <td>
                    <section>
                        <form action="/app/tasks/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $taskDeadline['id'] ?>" />
                            <button type="submit">X</button>
                        </form>

                    </section>
                </td>
        </tr>
</div>
<?php endforeach; ?>
</table>
</div>
</div>
<?php require __DIR__ . '/views/footer.php'; ?>