<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Reponse;

class ResponseHandlerController extends AbstractController
{
    /**
     * @Route("/responseHandler/{id}/{pin}/{question}/{answer}/{time}", name="response_handler")
     */
    public function responseHandler(int $id, int $pin, int $question, int $answer, int $time)
    {
                var_dump($id);
                var_dump($pin);
                var_dump($question);
                var_dump($answer);
                var_dump($time);

        $entityManager = $this->getDoctrine()
            ->getRepository(Reponse::class)
            ->findBy(['user' => $id]);


        var_dump($entityManager);

        return $this->render('responseHandler/responseHandler.html.twig');
    }
}
