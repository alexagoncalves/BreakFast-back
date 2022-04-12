<?php

namespace App\Controller\Backoffice;

use App\Entity\Bakery;
use App\Entity\User;
use App\Form\BakeryType;
use App\Repository\BakeryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/bakery")
 */
class BakeryController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_bakery_index", methods={"GET"})
     */
    public function index(BakeryRepository $bakeryRepository): Response
    {
        return $this->render('backoffice/bakery/index.html.twig', [
            'bakeries' => $bakeryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_backoffice_bakery_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BakeryRepository $bakeryRepository): Response
    {
        $bakery = new Bakery();
        $form = $this->createForm(BakeryType::class, $bakery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bakeryRepository->add($bakery);
            return $this->redirectToRoute('app_backoffice_bakery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/bakery/new.html.twig', [
            'bakery' => $bakery,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_bakery_show", methods={"GET"})
     */
    public function show(Bakery $bakery): Response
    {
        return $this->render('backoffice/bakery/show.html.twig', [
            'bakery' => $bakery,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_bakery_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Bakery $bakery, BakeryRepository $bakeryRepository): Response
    {
        $form = $this->createForm(BakeryType::class, $bakery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bakeryRepository->add($bakery);
            return $this->redirectToRoute('app_backoffice_bakery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/bakery/edit.html.twig', [
            'bakery' => $bakery,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_bakery_delete", methods={"POST"})
     */
    public function delete(Request $request, Bakery $bakery, BakeryRepository $bakeryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bakery->getId(), $request->request->get('_token'))) {
            $bakeryRepository->remove($bakery);
        }

        return $this->redirectToRoute('app_backoffice_bakery_index', [], Response::HTTP_SEE_OTHER);
    }
}
