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
            if (!file_exists(__DIR__ . "/../data/animalData.json")) {
                file_put_contents(__DIR__ . "/../data/animalData.json", json_encode([]));
            }


            $listofAnimals = json_decode(file_get_contents(__DIR__ . "/../data/animalData.json"), TRUE);
            file_put_contents(__DIR__ . "/../data/animalData.json", json_encode([
                ...$listofAnimals, [...$_POST, "animal" => $animal, "svoris" => $svoris]
            ]));
            return App::redirect('forma');
        }
    }
    // private $data, $file;
    // public function __construct($file)
    // {
    //     $this->file = $file;
    //     if (!file_exists(__DIR__ . '/data/' . $file . '.json')) { // jeigu file nera
    //         file_put_contents(__DIR__ . '/data/' . $file . '.json', json_encode([])); //ji sukuriam ir dedam i tuscia masyva
    //         file_put_contents(__DIR__ . '/data/' . $file . '_id.json', 0); //ji sukuriam kita file su id generatorium pradedant skaiciuoti  nuo 0
    //     }
    //     $this->data = json_decode(file_get_contents(__DIR__ . '/data/' . $file . '.json'), 1); //nuskaitome file get contents ir uzkoduojame i masyva
    // }
    // public function __destruct()
    // {
    //     file_put_contents(__DIR__ . '/data/' . $this->file . '.json', json_encode($this->data));
    // }
    // private function getId()
    // {
    //     $id = (int) file_get_contents(__DIR__ . '/data/' . $this->file . '_id.json'); // gaunam id
    //     $id++;
    //     file_put_contents(__DIR__ . '/data/' . $this->file . '_id.json', $id); // sudedam atgal i file 
    //     return $id;
    // }
    // public function create(array $data): void
    // {
    //     $data['id'] = $this->getId();
    //     $this->data[] = $data;
    // }
    public function showAll(): array
    {
        return  App::view('form', ['messages' => M::get()]);
    }
    public function show(int $id): array
    {
        foreach ($this->data as $data) {
            if ($data['id'] == $id) {
                return App::redirect('forma');
            }
        }
        return [];
    }
    public function delete(int $id): void
    {
        foreach ($this->data as $key => $data) {
            if ($data['id'] == $id) {
                unset($this->data[$key]);
                break;
            }
        }
    }
    public function update(int $id, array $data): void
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $this->data[$key] = $data;
                break;
            }
        }
    }
}
