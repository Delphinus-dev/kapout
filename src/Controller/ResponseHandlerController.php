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
     * @Route("/responseHandler/{user}/{pin}/{question}/{answer}/{time}", name="response_handler")
     */
    public function responseHandler(int $user, int $pin, int $question, int $answer, int $time)
    {
        $userDB = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($user);
//        var_dump($userDB);

        $entityManager = $this->getDoctrine()
            ->getRepository(Reponse::class)
            ->findBy(['question' => $question]);
//        var_dump($entityManager[0]->getReponse());

        if ($answer == $entityManager[0]->getReponse()) {
            var_dump("gagné");
            $nouveauScore = $userDB->getScore();
            $nouveauScore += $time;

            $userDB->setScore($nouveauScore);

            $trucManager = $this->getDoctrine()->getManager();

            $trucManager->persist($userDB);
            $trucManager->flush();

            //défalque le nombre de secondes consommées * 5
        }   else {
            var_dump("perdu");
        }

        return $this->render('responseHandler/responseHandler.html.twig');
    }
}
