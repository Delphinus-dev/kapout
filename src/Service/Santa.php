<?php

namespace App\Service;

class Santa
{
    const ID = 732;
    const NAME = "Santa Claus";
    const ALIAS = "Baba Noel";
    const BIRTHPLACE = "Patar, Lycia, Turkey";
    const LOVER = "Rudolph";
    const ALIGNMENT = "good";

    function echoName()
    {
        echo self::NAME;
    }
}

$instance = new Santa;
$instance->echoName();
