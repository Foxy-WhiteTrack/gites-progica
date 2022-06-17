<?php

namespace App\Controller\Admin;

use App\Entity\Equipement;
use App\Entity\Gite;
use App\Form\GiteType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="admin_index")
     */

    public function index(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Gite::class);
        $gites = $repository->findAll();

        return $this->render("admin/index.html.twig", [
            "menu" => "admin",
            "gites" => $gites
        ]);
    }

    /**
     * @Route("/admin/gite/create", name="admin_gite_create")
     */
    public function create(ManagerRegistry $doctrine, Request $request)
    {
        $gite = new Gite();
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $doctrine->getManager();
            $em->persist($gite);
            $em->flush();
            $this->addFlash('success', 'Gîte ajouté avec succès');
            return $this->redirectToRoute("admin_index");
        }

        return $this->renderForm("/admin/gite/create.html.twig", [
            "formGite" => $form
        ]);
    }


    /**
     * @Route("/admin/gite/edit{id}", name="admin_gite_edit")
     */
    public function edit(Gite $gite, Request $request, ManagerRegistry $doctrine)
    {
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $doctrine->getManager();
            $em->flush();
            $this->addFlash('success', 'Gîte modifié avec succès');
            return $this->redirectToRoute("admin_index");
        }

        return $this->renderForm("/admin/gite/edit.html.twig", [
            "formGite" => $form
        ]);
    }


    /**
     * @Route("/admin/gite/delete{id}", name="admin_gite_delete")
     */
    public function delete(Gite $gite, ManagerRegistry $doctrine, Request $request)
    {
        if ($this->isCsrfTokenValid("gite_delete" . $gite->getId(), $request->request->get('token'))) {
            $em = $doctrine->getManager();
            $em->remove($gite);
            $em->flush();
            $this->addFlash('success', 'Le gite a bien été supprimé');
        } else {
            $this->addFlash('error', 'Token non valide');
        }
        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/equipement/", name="admin_equipement")
     */
    public function equipement_admin(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Equipement::class);
        $equipements = $repository->findAll();

        return $this->render("equipement/index.html.twig", [
            "menu" => "admin_equipement",
            "equipements" => $equipements
        ]);
    }
}
