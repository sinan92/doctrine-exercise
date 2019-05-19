<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homeroute")
     */
    public function index(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/adminpage", name="adminroute")
     */
    public function admin(Request $request)
    {
        return new Response("adminpage<br/>");
    }

    /**
     * @Route("/userpage", name="userroute")
     */
    public function user(Request $request)
    {
        return new Response("userpage<br/>");
    }
}

