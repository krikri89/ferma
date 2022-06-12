<?php

namespace Farm;


class Messages
{
    private static $bag;
    //function kuri veikia pasileidus, patikrina ar yra jame msg, jei taip tai idedam i bag. 
    public static function init(): void // inicijuojam
    {
        self::$bag = $_SESSION['msg'] ?? [];
        unset($_SESSION['msg']); // ir tada istrinam 
    }
    // flash msg - vienkartinis pasirodymas
    public static function add(string $text, string $type): void //grazinam //reikalavimais function rasosi po : void = niekas. PO : rasosi ka funciton turi grazinti. 
    {
        $_SESSION['msg'][] = ['msg' => $text, 'type' => $type]; // spausdinam arba msg, arba tuscia array
    }
    public static function get(): array
    {
        return self::$bag;
    }
}
