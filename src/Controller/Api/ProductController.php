<?php

namespace App\Controller\Api;

use App\Entity\Bakery;
use App\Entity\Product;
use App\Repository\BakeryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="app_api_products", requirements={"id"="\d+"}, methods={"GET"})
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/products")
     */
    public function productsList(ProductRepository $productRepository): Response
    {
        $productsList = $productRepository->findAll();

        return $this->json(
            $productsList,
            Response::HTTP_OK,
            [],
            [
                'groups' => 'api_products_list'
            ]
        );
    }

    /**
     * @Route("/bakery/{id}/products")
     * Get all products by bakery and return into Json
     *
     * @param Product $product
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function productsByBakery(Bakery $bakery = null, int $id, ProductRepository $productRepository): Response
    {
        
        // Préparation des données des produits avec méthode dql
        $productsList = $productRepository->findAllByBakery($id);

        // Vérification si identifiant existe
          if (is_null($bakery)) {
            return $this->json(['Boulangerie non trouvée'], Response::HTTP_FORBIDDEN);
        }

        return $this->json(
            $productsList,
            Response::HTTP_OK,
            [],
            [
                'groups' => 'api_products_list',
            ]
        );
    }
}
