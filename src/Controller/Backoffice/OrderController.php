<?php

namespace App\Controller\Backoffice;

use App\Entity\Order;
use App\Entity\Product;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/order")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_order_read", methods={"GET"})
     */
    public function read(OrderRepository $orderRepository): Response
    {
        return $this->render('backoffice/order/read.html.twig', [
            'orders' => $orderRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_backoffice_order_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OrderRepository $orderRepository): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderRepository->add($order);
            return $this->redirectToRoute('app_backoffice_order_read', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/order/new.html.twig', [
            'order' => $order,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_order_show", methods={"GET"})
     */
    public function show(Order $order): Response
    {
        return $this->render('backoffice/order/show.html.twig', [
            'order' => $order,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_order_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Order $order, OrderRepository $orderRepository): Response
    {
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderRepository->add($order);
            return $this->redirectToRoute('app_backoffice_order_read', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/order/edit.html.twig', [
            'order' => $order,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_order_delete", methods={"POST"})
     */
    public function delete(Request $request, Order $order, OrderRepository $orderRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$order->getId(), $request->request->get('_token'))) {
            $orderRepository->remove($order);
        }

        return $this->redirectToRoute('app_backoffice_order_read', [], Response::HTTP_SEE_OTHER);
    }
}
