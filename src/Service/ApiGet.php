<?php


namespace App\Service;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiGet
{
    const API_URL = 'https://superheroapi.com/api/2608451795899942/';


    /**
     * @param array $apiGet
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getApi(): array
    {
        $id = range(1,731);
        shuffle($id);


        $apiAns = [];
        for ($i = 1; $i < 2; $i ++) {

            $client = HttpClient::create();
            $response = $client->request('GET', "" . self::API_URL . "$id[$i]");
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
                array_push($apiAns, $content);
                // array_rand(array($heroes), 1);
                }
            }


        return $apiAns;
    }

    public function randTab():array
    {
        $apiGet = (new \App\Service\ApiGet)->getApi();
        $apiGet2 = (new \App\Service\ApiGet)->getApi();
        dump($apiGet);
        $i = 0;
        foreach ($apiGet as $key => $value){
            $getQuestion[$i]['fullname'] = $apiGet[$key]['biography']['full-name'];
            $getQuestion['name'] = $apiGet[$key]['name'];
            $getQuestion[$i]['gender'] = $apiGet[$key]['appearance']['gender'];
            $getQuestion[$i]['alignment'] = $apiGet[$key]['biography']['alignment'];
            $getQuestion[$i]['race'] = $apiGet[$key]['appearance']['race'];
            $getQuestion[$i]['eye-color'] = $apiGet[$key]['appearance']['eye-color'];
            $getQuestion[$i]['base'] = $apiGet[$key]['work']['base'];
            $getQuestion[$i]['occupation'] = $apiGet[$key]['work']['occupation'];
            $getQuestion[$i]['publisher'] = $apiGet[$key]['biography']['publisher'];
            $getQuestion['url'] = $apiGet[$key]['image']['url'];
            $getQuestion2[$i]['fullname'] = $apiGet2[$key]['biography']['full-name'];
            $getQuestion2['name'] = $apiGet2[$key]['name'];
            $getQuestion2[$i]['gender'] = $apiGet2[$key]['appearance']['gender'];
            $getQuestion2[$i]['alignment'] = $apiGet2[$key]['biography']['alignment'];
            $getQuestion2[$i]['race'] = $apiGet2[$key]['appearance']['race'];
            $getQuestion2[$i]['eye-color'] = $apiGet2[$key]['appearance']['eye-color'];
            $getQuestion2[$i]['base'] = $apiGet2[$key]['work']['base'];
            $getQuestion2[$i]['occupation'] = $apiGet2[$key]['work']['occupation'];
            $getQuestion2[$i]['publisher'] = $apiGet2[$key]['biography']['publisher'];
            $getQuestion2['url'] = $apiGet2[$key]['image']['url'];

            foreach ($getQuestion[$i] as $k2 => $v2) {
                if ($v2 == 'null' ||
                    $v2 == '-' ||
                    $v2 == "" ||
                    $v2 ==  " ") {
                    unset($getQuestion[$i][$k2]);
                }
            }
            foreach ($getQuestion2[$i] as $k2 => $v2) {
                if ($v2 == 'null' ||
                    $v2 == '-' ||
                    $v2 == "" ||
                    $v2 ==  " ") {
                    unset($getQuestion2[$i][$k2]);
                }
            }
            $i++;
        }

        $tab = [];
        $i = 0;
        foreach ($getQuestion[0] as $key => $value ){
            $tab[$i] = $key. " : " . $value;
            $i++;
        }

        $tab2 = [];
        $i = 0;
        foreach ($getQuestion2[0] as $key => $value ){
            $tab2[$i] = $key. " : " . $value;
            $i++;
        }


        shuffle($tab2);
        shuffle($tab);

        $tableMesCouilles = [];

        array_push($tableMesCouilles, $getQuestion['name']);
        array_push($tableMesCouilles, $getQuestion['url']);

        for ($j = 0 ; $j < 3 ; $j++) {
            array_push($tableMesCouilles, $tab[$j]);
        }

        array_push($tableMesCouilles, $tab2[0]);

        return $tableMesCouilles;

    }
}