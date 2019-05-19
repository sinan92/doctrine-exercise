<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/author", name="author")
     */
    public function index()
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    /**
     * @Route("/addAuthor", name="addAuthor")
     */
    public function addAuthor()
    {
        $author = new Author();
        $author->setName("Sinan");

        $message1 = new Message();
        $message2 = new Message();
        $message1->setContent("Message 1");
        $message1->setAuthor($author);
        $message2->setContent("Message 2");
        $message2->setAuthor($author);

        $em = $this->getDoctrine()->getManager();
        $em->persist($author);
        $em->persist($message1);
        $em->persist($message2);
        $em->flush();

        return new Response("Test");
    }
}
