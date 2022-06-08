<?php

namespace App\Controller;

use App\Entity\Gite;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function home(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Gite::class);
        $gites = $repository->findAll();

        // $manager = $doctrine->getManager();

        // $gite = new Gite();
        // $gite
        //     ->setNom("Mon premier gite")
        //     ->setDescription("Lorem")
        //     ->setSurface(80)
        //     ->setChambre(3)
        //     ->setCouchage(5);

        // $manager->persist($gite);

        // $manager->flush();

        return $this->render('home/index.html.twig', [
            "titre" => "Super titre",
            "message" => "Helloooooow",
            "menu" => "home",
            "gites" => $gites
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
