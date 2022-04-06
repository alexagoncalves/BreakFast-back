<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api", name="app_api_category")
 */
class CategoryController extends AbstractController
{
    /**
     * Get list of all categories
     * 
     * @Route("/category", methods = {"GET"})
     * @return Response
     */
    public function categoriesList(CategoryRepository $categoryRepository): Response
    {
        // préparation des données
        $categoriesList = $categoryRepository->findAll();

        return $this->json(
            $categoriesList,
            Response::HTTP_OK,
            [],
            [
                'groups' => 'api_categories_list'
            ]
        );
    }
}
