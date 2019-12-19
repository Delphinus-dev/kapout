<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
     */
    public function question()
    {
        return $this->render('questionPage/index.html.twig');
    }
}
