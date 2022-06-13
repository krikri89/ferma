<?php

use Bankas\App;

require __DIR__ . '/top.php';
?>

<h1>List of animals</h1>

<div>
    <form class="form" method="post">
        <label>Animal</label>
        <select name="animal" id="animal">
            <option value="">--Select--</option>
            <option value="">Avis</option>
            <option value="">Antis</option>
            <option value="">Antilope</option>
        </select>
        <label>Svoris</label>
        <input type="text" name="svoris">
        <button class="form_btn" type="submit">Submit</button>
        <!-- <button class="form_btn" type="submit">Edit</button> -->
        <!-- <button class="form_btn" type="submit">Delete</button> -->
    </form>
</div>
<?php
require __DIR__ . '/bottom.php';
