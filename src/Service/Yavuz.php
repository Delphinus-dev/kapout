<?php

namespace App\Service;

class Yavuz
{
    const ID = 332; // ID DE HULK
    const NAME = "Yavuz Kutuk";

    const QUOTE_1 = "Je vous aime";
    const QUOTE_2 = "On peut négocier";
    const QUOTE_3 = "I ♥ KEBAB";
    const QUOTE_4 = "On vise l'EXCELLENCE";
    const QUOTE_5 = "JS c'est de la merde";
    const QUOTE_6 = "Laravel";

    const LIE_1 = "Je suis TOP";
    const LIE_2 = "J'adore faire du front";
    const LIE_3 = "Son habilitation en tant que juré Afpa expire en décembre 2022";

    const IMAGE = "https://www.superheroapi.com/api.php/2608451795899942/332/image";

    function echoName()
    {
        echo self::NAME;
    }
}

$instance = new Yavuz;
$instance->echoName();
