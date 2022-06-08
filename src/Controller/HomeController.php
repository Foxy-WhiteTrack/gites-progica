<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function home()
    {
        return $this->render('home/index.html.twig', [
            "titre" => "Super titre",
            "message" => "Helloooooow",
            "menu" => "home"
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */

    public function contact()
    {
        return $this->render('home/contact.html.twig', [
            "menu" => "contact"
        ]);
    }

    /**
     * @Route("/gites", name="gites")
     */

    public function gites()
    {
        return $this->render('home/gites.html.twig', [
            "menu" => "gites"
        ]);
    }

    /**
     * @Route("/gites", name="gites")
     */

    public function recherches()
    {
        return $this->render('home/recherches.html.twig', [
            "menu" => "recherches"
        ]);
    }
}
