<?php

namespace Farm\Controllers;

use Farm\Messages as M;
use Farm\App;

class HomeController
{
    public function form() //get 
    {
        return App::view('form', ['messages' => M::get()]);
    }

    public function doform() // post
    {
        M::add('Sas sukurta', 'alert');
        // $id = '';
        $animal = '';
        $svoris = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!file_exists(__DIR__ . "/../../data/animalData.json")) {
                file_put_contents(__DIR__ . "/../../data/animalData.json", json_encode([]));
            }


            // $listofAnimals = json_decode(file_get_contents(__DIR__ . "/../../data/animalData.json"), TRUE);
            file_put_contents(__DIR__ . "/../../data/animalData.json", json_encode([
                [...$_POST, "animal" => $animal, "svoris" => $svoris]
            ]));
            return App::redirect('home');
        }
    }
   
}
