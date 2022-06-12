<?php

use Bankas\App;

require __DIR__ . '/top.php';
?>

<h1>List of animals</h1>

<div>
    <?= $pet['id'] ?>
    Zveris: <?= $pet['animal'] ?>
    Svoris:<?= $pet['svoris'] ?> kg
    <a>[EDIT]</a>
    <form action="" method="post">
        <button type="submit">Delete</button>
    </form>
</div>
<?php
require __DIR__ . '/bottom.php';
