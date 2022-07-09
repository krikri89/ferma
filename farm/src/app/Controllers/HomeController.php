<?php

namespace Farm\Controllers;

use App\DB\Json;
use Farm\Messages as M;
use Farm\App;


class HomeController
{
    public function index() //get 
    {
        return App::view('home', ['title' => 'Farm', 'messages' => M::get()]);
    }

    public function list() // post
    {
        $pets = Json::get()->showAll();
        return App::view('list', ['title' => 'Farm', 'account' => $pets]);
    }
    public function keep()
    {
        if ($_POST['svoris'] <= 0) {
            return App::redirect('');
        }
        $account = [
            'animals' => ($_POST['animals'] ?? 0),
            'svoris' => ($_POST['svoris'] ?? 0)
        ];
        Json::get()->create($account);
        return App::redirect('list');
    }
    public function deleteAccount(string $id)
    {
        Json::get()->delete($id);
        return App::redirect('list');
    }
    public function toAdd(string $id)
    {
        $pets = Json::get()->show($id);
        return App::view('edit', ['title' => 'Farm', 'account' => $pets]);
    }
    public function add(string $id)
    {
        if ($_POST['add'] <= 0) {
            return App::redirect("edit/$id");
        }
        $animalData = Json::get()->show($id);
        $animalData['svoris'] = $_POST['svoris'];
        Json::get()->update($id, $animalData);
        return App::redirect('list');
    }
}
