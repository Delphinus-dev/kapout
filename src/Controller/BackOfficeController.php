<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BackOfficeController extends AbstractController
{
    /**
     * @Route("/backoffice", name="boPage")
     */
    public function backoffice()
    {
        return $this->render('backOfficePage/index.html.twig');
    }

    /**
     * @Route("/godata", name="sendData")
     */
    public function sendData()
    {
        // Un token a été calculé à partir de la clef secrète clef-privee-2-romaric-net1nf
        define('PUBLIC_JWT', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InB1Ymxpc2giOlsiKiJdfX0.NFCEbEEiI7zUxDU2Hj0YB71fQVT8YiQBGQWEyxWG0po');
        $topic = 'demo';
// On lit le nom des paramètres de notre script, sinon ce sera "Romaric" par défaut
        $name = isset($argv[1]) ? $argv[1] : 'Romaric';
        $postData = http_build_query([
            // On se place sur localhost:80, sur notre topic
            'topic' => 'http://localhost/'.$topic,
            'data' => json_encode([
                'eventName' => sprintf('%s a marqué un point!', $name),
            ]),
        ]);
// Il suffit d'une requête POST!
        $r = file_get_contents('https://mercure.mr486.com/.well-known/mercure', false, stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer ".PUBLIC_JWT,
            'content' => $postData,
        ]]));
        if (!$r) {
            echo sprintf("Erreur lors de l'envoi du message: %s\n", $r);
        }
        echo sprintf("Le message a bien été envoyé, reçu un ID: %s\n", $r);
    }
}
