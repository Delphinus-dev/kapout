<?php


namespace App\Service;

class Gilles
{
    const ID = 346; // ID DE IRONMAN
    const NAME = "Gilles Samuel";

    const QUOTE_1 = "Best campus manager ever";
    const QUOTE_2 = "Hamilton";
    const QUOTE_3 = "A fait les Beaux Arts";
    const QUOTE_4 = "Université de Chicoutimi";
    const QUOTE_5 = "Nike";
    const QUOTE_6 = "Wild code doggo Pika";

    const LIE_1 = "A été 1er à un concours de smurf à l'école primaire";
    const LIE_2 = "Déteste les figurines Pop";
    const LIE_3 = "Moi moche et méchant, c'est bon";

    const IMAGE = "https://www.superheroapi.com/api.php/2608451795899942/346/image";

    function echoName()
    {
        echo self::NAME;
    }
}

$instance = new Gilles;
$instance->echoName();
