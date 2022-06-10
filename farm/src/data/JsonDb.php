<?php

namespace App\DB;

use App\DB\DataBase;

$db = new JsonDB();
class JsonDB implements DataBase
{
    private $data;
    public function __construct($file)
    {
        if (!file_exists(__DIR__ . "/data/$file.json"));
    }
}
