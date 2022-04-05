<?php

namespace App\Controller\Api;

use App\Entity\Bakery;
use App\Repository\BakeryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BakeryController extends AbstractController
{
    /**
     * Method to get the list of all bakeries
     * @Route("/api/bakery", name="api_bakery", methods={"GET"})
     * @return Response
     */
    public function bakeryList(BakeryRepository $bakeryRepository): Response
    {
        // On va chercher les données
        $bakeryList = $bakeryRepository->findAll();

        return $this->json(
            // Les données à sérialiser (à convertir en JSON)
            $bakeryList,
            // Le status code
            200,
            // Les en-têtes de réponse à ajouter (aucune)
            [],
            // Les groupes à utiliser par le Serializer
            ['groups' => 'get_bakeries_list']
        );
    }

    /**
     * Method to get a bakery information using it's id
     * 
     * @Route("/api/bakery/{id<\d+>}", name="api_bakery_by_id", methods={"GET"})
     * @return Response
     */
    public function getItem(Bakery $bakery = null) :Response
    {
        // 404
        if ($bakery === null) {
            return $this->json(['error' => 'Boulangerie non trouvé.'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($bakery, Response::HTTP_OK, [], ['groups' => 'get_bakery_by_id']);
    }
}
