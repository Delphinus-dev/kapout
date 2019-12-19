<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\Publisher;
use Symfony\Component\Mercure\Update;

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
     * @param Publisher $publisher
     * @return Response
     */
    public function __invoke(Publisher $publisher): Response
    {
        $update = new Update(
            'questions',
            json_encode(['status' => 'OutOfStock'])
        );

        // The Publisher service is an invokable object
        $publisher($update);

        return new Response('published!');
    }
}
