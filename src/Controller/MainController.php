<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="mainPage")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/questions", name="questionPage")
     */
    public function question()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/test", name="testPage")
     */
    public function test()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/backoffice", name="boPage")
     */
    public function backoffice()
    {
        return $this->render('backOffice/index.html.twig');
    }
}
