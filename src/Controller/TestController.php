<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="testPage")
     */
    public function index()
    {
        return $this->render('testPage/testPageIndex.html.twig');
    }
}
