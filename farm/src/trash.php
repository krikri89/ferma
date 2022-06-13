 <!-- if ('GET' == $m && count($uri) == 1 && $uri[0] === 'all') {
            echo '<h1>All users</h1>'; //duomenu atvaizdavimas, taip nedaryti
            return (new HomeController)->showAll();
            //             // foreach ($db->showAll() as $pet) {
            //             // 
            // 
?>
            // // <div>
                // // <?= $pet['id'] ?>
                // // Zveris: <?= $pet['animal'] ?>
                // // Svoris:<?= $pet['svoris'] ?> kg
                // // <a href="<?= DOMAIN . 'edit/' . $pet['id'] ?>">[EDIT]</a>
                // // <form action="<?= DOMAIN . 'delete/' . $pet['id'] ?>" method="post">
                    // // <button type="submit">Delete</button>
                    // // </form>
                // // </div>
            // // <?php
                    //                 //             }
                    //                 //         }
                    if ('GET' == $m && count($uri) == 2 && $uri[0] === 'pet') {
                        echo '<h1>One pet</h1>';
                        $pet = $db->show($uri[1]);
                    ?>
                <div>
                    <?= $pet['id'] ?>
                    Zveris: <?= $pet['animal'] ?>
                    Svoris:<?= $pet['svoris'] ?>

                </div>
            <?php
                    }
                    if ('POST' == $m && count($uri) == 2 && $uri[0] === 'delete') {
                        $db->delete($uri[1]); //is duomenu bazes pasikvieciam delete method
                        header('Location:' . DOMAIN . 'all'); // redirectinam kur gris po delete
                        die;
                    }
                    if ('GET' == $m && count($uri) == 2 && $uri[0] === 'edit') {
                        echo '<h1>Edit</h1>';
                        $pet = $db->show($uri[1]); // pet pasirinkimas 

            ?>
                <div>
                    <?= $pet['id'] ?>
                    <form action="<?= DOMAIN . 'edit/' . $pet['id'] ?>" method="post">
                        Svoris <input type="text" name="svoris" value="<?= $pet['svoris'] ?>">
                        Zveris <input type="text" name="animal" value="<?= $pet['animal'] ?>" readonly>
                        animal <select name="animal" id="animal">
                            <option value="">----Choose animal----</option>
                            <option value="Avis">Avis</option>
                            <option value="Antis">Antis</option>
                            <option value="Antilope">Antilope</option>
                        </select>
                        <button type="submit">Save</button>
                    </form>
                </div>
            <?php
                    }
                    if ('POST' == $m && count($uri) == 2 && $uri[0] === 'edit') {
                        $pet = $db->show($uri[1]); //paimam pet senus duomenis
                        $pet['svoris'] = $_POST['svoris']; // sena pet pakeiciam tuo ka gaunam is post
                        $pet['animal'] = $_POST['animal'];
                        $db->update($uri[1], $pet);
                        header('Location:' . DOMAIN . 'all'); // redirectinam kur gris po edit
                        die;
                    }
                    if ('GET' == $m && count($uri) == 1 && $uri[0] === 'create') {
                        echo '<h1>Create</h1>';

            ?>
                <form action="<?= DOMAIN . 'create' ?>" method="post">

                    Svoris <input type="text" name="svoris">
                    animal <select name="animal" id="animal">
                        <option value="">----Choose animal----</option>
                        <option value="Avis">Avis</option>
                        <option value="Antis">Antis</option>
                        <option value="Antilope">Antilope</option>
                    </select>
                    <button type="submit">Create</button>
                </form>
<?php
                    }
                    if ('POST' == $m && count($uri) == 1 && $uri[0] === 'create') {
                        $pet['svoris'] = $_POST['svoris'];
                        $pet['animal'] = $_POST['animal'];
                        $db->create($pet);
                        header('Location:' . DOMAIN . 'all'); // redirectinam kur gris po create
                        die; -->