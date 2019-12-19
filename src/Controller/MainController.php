<?php

namespace App\Controller;

use App\Service\ApiGet;
use App\Service\ReplaceDash;
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
        $apiGet = (new \App\Service\ApiGet)->getApi();
        dump($apiGet);
        return $this->render('questionPage/index.html.twig', [
            'apians' => $apiGet
        ]);
    }
}
