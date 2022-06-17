<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Entity\Contact;
use App\Entity\GiteSearch;
use App\Form\GiteSearchType;
use App\Form\ContactType;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Notification\ContactNotification;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function home(ManagerRegistry $doctrine, Request $request)
    {


        /** @var GiteRepository $repository */
        $repository = $doctrine->getRepository(Gite::class);
        $gites = $repository->findAll();


        return $this->render('home/index.html.twig', [
            "titre" => "Super titre",
            "message" => "Helloooooow",
            "menu" => "home",
            "gites" => $gites,

        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */

    public function contact(Request $request, ContactNotification $notification)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->contactNotify($contact);
            $this->addFlash('success', 'Email envoyé!');
        }

        return $this->render('home/contact.html.twig', [
            "menu" => "contact",
            "form" => $form->createView()
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

    public function recherches(ManagerRegistry $doctrine, Request $request)
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

        return $this->render('home/recherches.html.twig', [
            "menu" => "recherches",
            "gites" => $gites,
            "form" => $form->createView()
        ]);
    }
}
