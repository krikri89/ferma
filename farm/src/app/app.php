<?php

namespace Farm;

use Farm\Controllers\HomeController;
use Farm\Controllers\DataController;
use Farm\Messages;

class App
{
    // $db = new DataController('animalData');

    const DOMAIN = 'kukufarm.lt';
    private static $html;

    public static function start()
    {
        session_start();
        Messages::init();
        ob_start();
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
        self::$html = ob_get_contents();
        // print_r($uri);
        ob_end_clean();
    }
    public static function sent()
    {
        echo self::$html;
    }
    public static function listofAnimals($listofAnimals = [])
    {
        echo json_encode($listofAnimals[]);
    }

    public static function view($name)
    {
        return require __DIR__ . '/../views/' . $name . '.php';
    }

    public static function redirect($url = '')
    {
        header('Location: http://' . self::DOMAIN . '/' . $url);
    }

    public static function url($url = '')
    {
        return 'http://' . self::DOMAIN . '/' . $url;
    }


    private static function route(array $uri)
    {

        $m = $_SERVER['REQUEST_METHOD'];


        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'form') {
            return (new HomeController)->form();
        }

        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'home') {
            return (new HomeController)->showAll();
        }
        if ('POST' == $m && count($uri) == 1 && $uri[0] === 'form') {
            return (new HomeController)->doForm();
        } else {
            echo 'kita';
        }
        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'all') {
?>
            <a href="<?= URL . 'create/' ?>">Create new</a>
            <?php
            echo '<h1>List </h1>'; //duomenu atvaizdavimas, taip nedaryti
            foreach ($db->showAll() as $pet) {
            ?>

                <div>
                    <?= $pet['id'] ?>
                    Zveris: <?= $pet['animal'] ?>
                    Svoris:<?= $pet['svoris'] ?> kg
                    <a style="color:solid purple" href="<?= URL . 'edit/' . $pet['id'] ?>">EDIT</a>
                    <form action="<?= URL . 'delete/' . $pet['id'] ?>" method="post">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            <?php
            }
        }
        if ('GET' == $m && count($uri) == 2 && $uri[0] === 'pet') {
            echo '<h1>Kas</h1>';
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
            header('Location:' . URL . 'all'); // redirectinam kur gris po delete
            die;
        }
        if ('GET' == $m && count($uri) == 2 && $uri[0] === 'edit') {
            echo '<h1>Edit</h1>';
            $pet = $db->show($uri[1]); // pet pasirinkimas 

        ?>
            <div>
                <?= $pet['id'] ?>
                <form action="<?= URL . 'edit/' . $pet['id'] ?>" method="post">
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
            header('Location:' . URL . 'all'); // redirectinam kur gris po edit
            die;
        }
        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'create') {
            return (new HomeController)->doForm();

        }
        if ('POST' == $m && count($uri) == 1 && $uri[0] === 'create') {
            $pet['svoris'] = $_POST['svoris'];
            $pet['animal'] = $_POST['animal'];
            $db->create($pet);
            header('Location:' . URL . 'all'); // redirectinam kur gris po create
            die;
        }
    }
}
