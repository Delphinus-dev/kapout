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
        $i = 0;
            foreach ($apiGet as $key => $value){
                $getQuestion[$i]['fullname'] = $apiGet[$key]['biography']['full-name'];
                $getQuestion[$i]['gender'] = $apiGet[$key]['appearance']['gender'];
                $getQuestion[$i]['alignment'] = $apiGet[$key]['biography']['alignment'];
                $getQuestion[$i]['race'] = $apiGet[$key]['appearance']['race'];
                $getQuestion[$i]['eye-color'] = $apiGet[$key]['appearance']['eye-color'];
                $getQuestion[$i]['base'] = $apiGet[$key]['work']['base'];
                $getQuestion[$i]['occupation'] = $apiGet[$key]['work']['occupation'];
                $getQuestion[$i]['publisher'] = $apiGet[$key]['biography']['publisher'];
                    foreach ($getQuestion[$i] as $k2 => $v2) {
                        if (
                            $v2 == 'null' ||
                            $v2 == "-" ||
                            $v2 == "") {

                            unset($getQuestion[$i][$k2]);
                        }
                    }
                $i++;
            json_encode($getQuestion, JSON_FORCE_OBJECT);
            }
        // foreach pour faire sauter les entrées vides
        // foreach shufflisation des données par personne
        // récupération des 3 réponses justes
        // grâce aux clefs tu prépares la question
        // recolle tout ça dans un tableau dans le bon sens par rapport aux besoins d'Amca
        // json_encode

         var_dump($getQuestion);
        return $this->render('questionPage/index.html.twig', [
            'apians' => $apiGet
        ]);
    }
}
