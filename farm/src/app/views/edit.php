<?php

$title = 'home';

require __DIR__ . '/top.php';

?>
<h1>List of animals</h1>
<?php foreach ($account as $key => $pet) : ?>


    <form method="POST">
        <span><?= $pet['animals'] ?></span>
        <span><?= $pet['svoris'] ?> kg</span>
        <span>Keisti svori <input type="number" name="add"></span>
        <button type="submit">Edit</button>
    </form>
<?php endforeach ?>


<?php

require __DIR__ . '/bottom.php';
