<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserModifType;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class UserController extends AbstractController
{
    /**
     * @Route("/profil/{id}", name="profil")
     */
    public function show(User $user): Response
    {
        return $this->render('home/profil.html.twig', [
            "menu" => "profil",
            "user" => $user
        ]);
    }


    /**
     * @Route("/profil/edit/{id}", name="profil_edit")

     */

    public function edit(Request $request, User $user, ManagerRegistry $doctrine, int $id): Response
    {


        $form = $this->createForm(UserModifType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            $this->addFlash('success', 'Votre profil à bien été modifié');
            return $this->redirectToRoute('home');
        }

        return $this->render('user/useredit.html.twig', [
            "menu" => "profil",
            "form" => $form->createView()
        ]);
    }
}
