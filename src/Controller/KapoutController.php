<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class KapoutController extends AbstractController
{
    /**
     * @Route("/",
     *     name="kapout_index")
     * @return Response A response instance
     */
    public function index(): Response
    {

        return $this->render(
            '/index.html.twig'
        );
    }
}
