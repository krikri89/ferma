<?php

$title = 'home';

require __DIR__ . '/top.php';

?>

<h1>Farm</h1>

<form method="POST">
    Svoris
    <input type="number" name="svoris">
    <select name="animals" id="animals">
        <option value="">--Select--</option>
        <option value="Avis">Avis</option>
        <option value="Antis">Antis</option>
        <option value="Antilope">Antilope</option>
    </select>
    <button type="submit">Create</button>
</form>

<?php

require __DIR__ . '/bottom.php';
