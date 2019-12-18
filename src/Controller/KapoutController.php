<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KapoutController extends AbstractController
{
    /**
     * @Route("/", name="mainPage")
     */
    public function index()
    {
        return $this->render('mainPage/mainPageIndex.html.twig');
    }
}
