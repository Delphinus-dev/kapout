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
}
