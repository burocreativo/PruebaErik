<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;

use DateTime;
use DateTimeInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */

    ///**
     //* @Route("/user")
     //* @Method({"GET"})
     //*/
    public function index(): Response
    {
        /*return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);*/

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        //$users = gettype($users);

        foreach($users as $user) {
            $createdAt = $user->getCreatedAt();
            $usersCollection[] = array(
                'id' => $user->getId(),
                'name' => $user->getName(),
                'lastname' => $user->getLastname(),
                'createdAt' => date_format($createdAt, 'd/m/Y'),
                'daysPassed' => date_diff($user->getCreatedAt(), new \DateTime('now'))->format('%a')
            );
        }

        /*$query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT u.name
            FROM App\Entity\User u'
        );
        $users = $query->getArrayResult();*/

        $response = new Response();
        $response->setContent(json_encode(['error' => false, 'users' => $usersCollection]));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/user/create")
     *
     */
    public function create(Request $request): Response
    {
        //$request = $event->getRequest();
        $content = $request->getContent();
        if (empty($content)) {
            return false;
        }
        if (!$this->isJsonRequest($request)) {
            return false;
        }
        if (!$this->transformJsonBody($request)) {
            $response = Response::create('Unable to parse request.', 400);
            //$event->setResponse($response);
        }


        //$request = $this->transformJsonBody($request);

        //return $request;
        
        $entityManager = $this->getDoctrine()->getManager();

        //$data = json_decode($request, true);

        $user = new User();
        $user->setName($request->get('name'));
        $user->setLastname($request->get('lastname'));

        $entityManager->persist($user);
        $entityManager->flush();

        $userSaved[] = array(
            'id' => $user->getId(),
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'createdAt' => date_format($user->getCreatedAt(), 'd/m/Y'),
            'daysPassed' => date_diff($user->getCreatedAt(), new \DateTime('now'))->format('%a')
        );

        $response = new Response();
        $response->setContent(
            json_encode([
                'error' => false, 
                'message' => 'User ' . $user->getId() . ' ' . $user->getName() . ' ' . $user->getLastname() . ' was created successfuly', 
                'user' => $userSaved[0]
            ]));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function isJsonRequest(Request $request) {
        return 'json' === $request->getContentType();
    }

    private function transformJsonBody(Request $request) {
        $data = json_decode($request->getContent(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return false;
        }
        if ($data === null) {
            return true;
        }
        $request->request->replace($data);
        return true;
    }
}
