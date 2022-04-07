<?php

namespace App\Controller\Api;

use App\Entity\Category;
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

    /**
     * Method to get a category information using it's id
     * 
     * @Route("/category/{id}", name="api_category_by_id", requirements={"id"="\d+"}, methods={"GET"})
     * @return Response
     */
    public function categoryById(Category $category = null): Response
    {
        // Vérification si aucune catégorie trouvée
        if (is_null($category)) {
            return $this->json(['error' => 'categorie non trouvée.'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($category, Response::HTTP_OK, [], ['groups' => 'get_category_by_id']);
    }
}
