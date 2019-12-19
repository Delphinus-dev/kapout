<?php

namespace App\Controller;

use http\Env\Request;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SuperHeroController extends AbstractController
{
    const API_URL = 'https://superheroapi.com/api/2608451795899942/';

    /**
     * @Route("/super/hero", name="super_hero")
     */
    public function index()
    {
        return $this->render('super_hero/index.html.twig', [
            'controller_name' => 'SuperHeroController',
        ]);
    }

    /**
     * @Route("/super/{id}", name="super_api")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getApi($id): \Symfony\Component\HttpFoundation\Response
    {
        if ($id = 332 || $id = 346){
            $id++;
        }
        $id = rand(1, 731);

        $client = HttpClient::create();
        $response = $client->request('GET', "".self::API_URL."{$id}");
        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        $statusCode = $response->getStatusCode(); // get Response status code 200

        if ($statusCode === 200) {
            $content = $response->getContent();
            // get the response in JSON format

            $content = $response->toArray();
            // convert the response (here in JSON) to an PHP array
        }

            return $this->render('super_hero/index.html.twig',
                [
                    'content' => $content
                ]);
    }
}
