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
        $api = new ApiGet();
        $indexApi = $api->randTab();
        var_dump($indexApi);
        $indexAnswer = range(2,5);

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


        return $this->render('questionPage/index.html.twig');
    }
}
