<?php


namespace App\Service;

class Gilles
{
    const ID = 346; // ID DE IRONMAN
    const NAME = "Gilles Samuel";
    const QUOTE1 = "Best campus manager";
    const QUOTE2 = "Hamilton";
    const QUOTE3 = "";
    const LIE = "";
    const IMAGE = "https://www.superheroapi.com/api.php/2608451795899942/346/image";

    function echoName()
    {
        echo self::NAME;
    }
}

$instance = new Gilles;
$instance->echoName();
