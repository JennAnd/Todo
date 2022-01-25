<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$search_results = get_search_results($database); ?>

<article>
    <h1>Search result<h1>
            <h2>tasks containing: <?= ($_POST['search']) ?></h2>
            <ul>
                <?php
                foreach ($search_results as $task) : ?>
                    <?php if ($_SESSION['user']['id']) : ?>
                        <li>
                            <h6> <?= $task['title'] ?> </h6>
                            <p>Description: <?= $task['description'] ?> <br>
                                Deadline: <?= $task['deadline']; ?> <br>
                                List: <?= $task['list_title']; ?></p>
                            <button>
                                <a href="/update-tasks.php?= $task['id']; ?>">Update</a>
                            </button>
                            <br>
                            <br>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>

            <?php
            require __DIR__ . '/views/footer.php';
