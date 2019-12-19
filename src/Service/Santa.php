<?php

namespace App\Service;

class Santa
{
    const ID = 732;
    const NAME = "Santa Claus";
    const ALIAS_1 = "Is also called Baba Noel";
    const ALIAS_2 = "Tex-Mex Santa is called Pancho Claus";
    const PLACE_OF_BIRTH = "Was born in Patar, Lycia, Turkey";
    const GROUP_AFFILATION = "Rudolph guides him with his red nose";

    const LIE_2 = "His wife is called Barbie"; // celle-là, c'est pour Xavier
    const LIE_3 = "Comes from the Dutch name Sante Käse";

    const IMAGE = "https://comicvine1.cbsistatic.com/uploads/scale_medium/0/77/2165906-santa_claus_by_genzoman_d35f6t4.jpg";

    function echoName()
    {
        echo self::NAME;
    }
}

$instance = new Santa;
$instance->echoName();
