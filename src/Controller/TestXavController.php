<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestXavController extends AbstractController
{
    /**
     * @Route("/testXav", name="test_xav")
     */
    public function index()
    {
        return $this->render('test_Xav/index.html.twig', [
            'controller_name' => 'TestXavController',
        ]);
    }
}
