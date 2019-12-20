<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Service\ApiGet;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="newHomePage")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $users = new User();
        $form = $this->createForm(RegistrationType::class, $users);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();
            $id = $users->getId();

            return $this->redirectToRoute('game_route', array('id' => $id));
        }
        return $this->render('newHomePage/index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/game" , name="game_route")
     * @return Response
     */
    public function routeGame()
    {
        return $this->render('test_Xav/index.html.twig');
    }
}
