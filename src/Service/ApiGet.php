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
        for ($i = 1; $i < 8; $i ++) {
/*            for ($a = 1; $a < 4 ; $a ++)
            {
                $apiAns[$i[$a]];*/


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
}