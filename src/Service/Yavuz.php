<?php

namespace App\Service;

class Yavuz
{
    const ID = 332; // ID DE HULK
    const NAME = "Yavuz Kutuk";
    const QUOTE1 = "Je vous aime";
    const QUOTE2 = "On peut négocier";
    const QUOTE3 = "I ♡ KEBAB";
    const LIE = "Il est TOP";
    const IMAGE = "https://www.superheroapi.com/api.php/2608451795899942/332/image";

    function echoName()
    {
        echo self::NAME;
    }
}

$instance = new Yavuz;
$instance->echoName();
