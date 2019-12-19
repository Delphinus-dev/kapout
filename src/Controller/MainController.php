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
        return $this->render('mainPage/mainPageIndex.html.twig');
    }

    /**
     * @Route("/questions", name="questionPage")
     */
    public function question()
    {
        return $this->render('questionPage/questionPageIndex.html.twig');
    }

    /**
     * @Route("/test", name="testPage")
     */
    public function test()
    {
        return $this->render('testPage/testPageIndex.html.twig');
    }
}
