<?php


namespace App\Controller;

use App\Entity\Reponse;
use App\Entity\User;
use App\Service\ApiGet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class BackOfficeController extends AbstractController
{

    protected $santaClaus = [
        0 => 'Santa Claus',
        1 => "https://comicvine1.cbsistatic.com/uploads/scale_medium/0/77/2165906-santa_claus_by_genzoman_d35f6t4.jpg",
        2 => "He is also called Baba Noel",
        3 => "He was born in Patar, Lycia, Turkey",
        4 => "Tex-Mex Santa is called Pancho Claus",
        5 => "His name comes from the Dutch name Sante Käse"
    ];

    protected $yavuz = [
        0 => 'Yavuz Kutuk',
        1 => "https:\/\/www.superherodb.com\/pictures2\/portraits\/10\/100\/83.jpg",
        2 => "I ♥ KEBAB",
        3 => "On vise l'EXCELLENCE",
        4 => "Je vous aime",
        5 => "Je suis TOP"
    ];

    protected $samuel = [
        0 => 'Gilles Samuel',
        1 => "https:\/\/www.superherodb.com\/pictures2\/portraits\/10\/100\/85.jpg",
        2 => "Best campus manager ever",
        3 => "Université de Chicoutimi",
        4 => "J'ai 30 ans",
        5 => "Moi, moche et méchant, c'est bon"
    ];

    /**
     * @Route("/backoffice", name="boPage")
     */
    public function backoffice()
    {
        return $this->render('backOfficePage/index.html.twig');
    }

    /**
     * @Route("/reponse", name="reponse")
     */
    public function reponse()
    {
        $bonneReponse  = $this->getDoctrine()
        ->getRepository(Reponse::class)
            ->findAll();
        $maxA = max($bonneReponse);
//        var_dump();
//        var_dump($bonneReponse[max($bonneReponse)-1]['text']);

        define('PUBLIC_JWT', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InB1Ymxpc2giOlsiKiJdfX0.NFCEbEEiI7zUxDU2Hj0YB71fQVT8YiQBGQWEyxWG0po');
        $postData = http_build_query([
            // On se place sur localhost:80, sur notre topic
            'topic' => 'reponse',
            'data' => $maxA->getText(),//'la réponse D',
        ]);
        $r = file_get_contents('https://mercure.mr486.com/.well-known/mercure', false, stream_context_create(['http' => [
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer " . PUBLIC_JWT,
            'content' => $postData,
        ]]));

        return $this->render('questionPage/reponse.html.twig');
    }

    /**
     * @Route("/questions", name="question")
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function question()
    {

        $nbQuestions = $this->getDoctrine()
            ->getRepository(Reponse::class)
            ->countQuestions(231079);

        switch ($nbQuestions) {
            // switch ($this->getQuestions()) {
            case 0 :
            case 1 :
            case 2 :
            case 3 :
            case 4 :
            case 5 :
            case 6 :

                $api = new ApiGet();
                $indexApi = $api->randTab();
                break;
            case 7 :
                // SantaClaus
                $indexApi = $this->santaClaus;
                break;
            case 8 :
                // Yavuz
                $indexApi = $this->yavuz;
                break;
            case 9 :
                // Gilles
                $indexApi = $this->samuel;
                break;

            default :

                break;
        }
        $indexAnswer = range(2, 5);

        shuffle($indexAnswer);
        $newPos = array_search(5, $indexAnswer);


        // Insérer la bonne réponse dans la base de données
        $entityManager = $this->getDoctrine()->getManager();

        $question = new Reponse();
        $question->setReponse($newPos);
        $question->setPin(231079);
        $question->setQuestion($nbQuestions+1);
        $question->setText($indexApi[5]);

        $entityManager->persist($question);
        $entityManager->flush();

        $indexTab = [];
        array_push($indexTab, $indexApi[0]);
        array_push($indexTab, $indexApi[1]);
        array_push($indexTab, $indexApi[$indexAnswer[0]]);
        array_push($indexTab, $indexApi[$indexAnswer[1]]);
        array_push($indexTab, $indexApi[$indexAnswer[2]]);
        array_push($indexTab, $indexApi[$indexAnswer[3]]);
        $time['timer'] = 20;
        array_push($indexTab, 20 );

        define('PUBLIC_JWT', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InB1Ymxpc2giOlsiKiJdfX0.NFCEbEEiI7zUxDU2Hj0YB71fQVT8YiQBGQWEyxWG0po');
        $postData = http_build_query([
            // On se place sur localhost:80, sur notre topic
            'topic' => 'question',
            'data' => json_encode($indexTab),
        ]);
        $r = file_get_contents('https://mercure.mr486.com/.well-known/mercure', false, stream_context_create(['http' => [
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer " . PUBLIC_JWT,
            'content' => $postData,
        ]]));

        return $this->render('questionPage/index.html.twig');
    }
   /* /**
     *
     *
     * @return User|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    /*public function halloffame()
    {
        return $this
            ->createQueryBuilder("u")
            ->orderBy("u.score", "DESC")
            ->setMaxResults(3)
            ->getQuery()
            ->getOneOrNullResult();
    }**/

    /**
     * @Route("/hall", name="halloffame")
     * @return Response
     */
    public function hall() : Response
    {
        $score = new User();
        if (!$score) {
            throw $this->createNotFoundException(
                'No score  found in user\'s table.'
            );
        }
        $score =  $this ->getDoctrine()
            ->getRepository(User::class)
            ->findBy(['score'=>$score->getScore()], ['score'=>'DESC'], 3);

        return $this->render('hall/index.html.twig',
            ['score' => $score,
            ]);
    }
}
