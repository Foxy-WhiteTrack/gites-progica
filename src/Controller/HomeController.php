<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Entity\GiteSearch;
use App\Form\GiteSearchType;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function home(ManagerRegistry $doctrine, Request $request)
    {
        $search = new GiteSearch();

        $form = $this->createForm(GiteSearchType::class, $search);
        $form->handleRequest($request);

        /** @var GiteRepository $repository */
        $repository = $doctrine->getRepository(Gite::class);
        $gites = $repository->findAll();

        if ($form->isSubmitted()) {
            $gites = $repository->findGiteSearch($search);
        }

        return $this->render('home/index.html.twig', [
            "titre" => "Super titre",
            "message" => "Helloooooow",
            "menu" => "home",
            "gites" => $gites,
            "form" => $form->createView()
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

    public function gites(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Gite::class);
        $gites = $repository->findAll();
        return $this->render('home/gites.html.twig', [
            "menu" => "gites",
            "gites" => $gites
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
