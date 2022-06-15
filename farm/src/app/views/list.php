<?php

$title = 'home';

require __DIR__ . '/top.php';

?>
<h1>List of animals</h1>
<ul>
    <?php foreach ($account as $key => $pet) : ?>
        <li>
            <span><?= $pet['animals'] ?></span>
            <span><?= $pet['svoris'] ?> kg</span>
            <div>
                <form action="<?= 'http://kukufarm.lt/delete/' . $pet['id'] ?>" method="post">
                    <button type="submit">Delete</button>
                </form>
                <a href="<?= 'http://kukufarm.lt/edit/' . $pet['id'] ?>">Edit</a>
            </div>
        </li>
    <?php endforeach ?>
</ul>

<?php

require __DIR__ . '/bottom.php';
