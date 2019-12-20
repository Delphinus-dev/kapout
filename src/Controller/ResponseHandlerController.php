<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Reponse;

class ResponseHandlerController extends AbstractController
{
    /**
     * @Route("/responseHandler/{user}/{pin}/{answer}/{time}", name="response_handler")
     */
    public function responseHandler(int $user, int $pin, int $answer, int $time)
    {
        $userDB = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($user);

        $bonneReponse  = $this->getDoctrine()
            ->getRepository(Reponse::class)
            ->findAll();
        $maxA = max($bonneReponse);
        $question = $maxA->getQuestion();

        $entityManager = $this->getDoctrine()
            ->getRepository(Reponse::class)
            ->findBy(['question' => $question]);

        $nouveauScore = $userDB->getScore();

        if ($answer == $entityManager[0]->getReponse()) {
            //var_dump("gagné");
            $nouveauScore += $time;
        }   else {
            //var_dump("perdu");
            $nouveauScore -= $time;
        }
            $userDB->setScore($nouveauScore);
        $trucManager = $this->getDoctrine()->getManager();

        $trucManager->persist($userDB);
        $trucManager->flush();


        return $this->render('responseHandler/responseHandler.html.twig');
    }
}
