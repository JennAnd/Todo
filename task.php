<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['user']['profile_image'])) : ?>
    <img class="profile-image" src="/upload/<?php echo $_SESSION['user']['profile_image'] ?>">
<?php endif; ?>
<h2>Create tasks</h2><br>


<form action="app/users/tasks/tasks.php" method="post" enctype="multipart/form-data">

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





        <?php if (isset($_SESSION['addTask'])) :
            echo $_SESSION['addTask'];
            unset($_SESSION['addTask']);

            if (isset($_SESSION['user']['addTask'])) :
            endif;
        endif; ?>
    </div>
</form>



<?php require __DIR__ . '/views/footer.php'; ?>