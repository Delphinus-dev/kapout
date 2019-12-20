<?php

namespace App\Controller;

use App\Service\ApiGet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class MainController extends AbstractController
{
    protected $santaClaus = [
        0 => 'Santa Claus',
        1 => "https://comicvine1.cbsistatic.com/uploads/scale_medium/0/77/2165906-santa_claus_by_genzoman_d35f6t4.jpg",
        2 => "He is also called Baba Noel",
        3 => "He was born in Patar, Lycia, Turkey",
        4 => "Tex-Mex Santa is called Pancho Claus",
        5 => "His name comes from the Dutch name Sante Käse"
    ];

    protected $yavuz = [
        0 => 'Yavuz Kutuk',
        1 => "https:\/\/www.superherodb.com\/pictures2\/portraits\/10\/100\/83.jpg",
        2 => "I ♥ KEBAB",
        3 => "On vise l'EXCELLENCE",
        4 => "Je vous aime",
        5 => "Je suis TOP"
    ];

    protected $samuel = [
        0 => 'Gilles Samuel',
        1 => "https:\/\/www.superherodb.com\/pictures2\/portraits\/10\/100\/85.jpg",
        2 => "Best campus manager ever",
        3 => "Université de Chicoutimi",
        4 => "J'ai 30 ans",
        5 => "Moi, moche et méchant, c'est bon"
    ];
    /**
     * @Route("/", name="newHomePage")
     */
    public function index()
    {
        return $this->render('newHomePage/index.html.twig');
    }

    /**
     * @Route("/test", name="oldMainPage")
     */
    public function oldHomePage()
    {
        return $this->render('oldMainPage/index.html.twig');
    }

    /**
     * @Route("/questions", name="questionPage")
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function question()
    {
        if ($this->getQuestions() < 8) {


            $api = new ApiGet();
            $indexApi = $api->randTab();
            var_dump($indexApi);
            $indexAnswer = range(2, 5);

            shuffle($indexAnswer);
            // Insérer la bonne réponse dans la base de données
            var_dump($indexAnswer[3]);
            $indexTab = [];
            array_push($indexTab, $indexApi[0]);
            array_push($indexTab, $indexApi[1]);
            array_push($indexTab, $indexApi[$indexAnswer[0]]);
            array_push($indexTab, $indexApi[$indexAnswer[1]]);
            array_push($indexTab, $indexApi[$indexAnswer[2]]);
            array_push($indexTab, $indexApi[$indexAnswer[3]]);
            var_dump($indexTab);
        } else {

        }

        return $this->render('questionPage/index.html.twig');
    }
}
