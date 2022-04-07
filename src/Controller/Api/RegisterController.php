<?php

namespace App\Controller\Api;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Exception\NotEncodableValueException as ExceptionNotEncodableValueException;

class RegisterController extends AbstractController
{
    /**
     * @Route("/api/register", name="api_register")
     */
    public function createItem(Request $request, SerializerInterface $serializer, ManagerRegistry $doctrine, ValidatorInterface $validator)
    {
        // Récupérer le contenu JSON
        $jsonContent = $request->getContent();

        try {
            // Désérialiser (convertir) le JSON en entité Doctrine Movie
            $user = $serializer->deserialize($jsonContent, User::class, 'json');
        } catch (ExceptionNotEncodableValueException $e) {
            // Si le JSON fourni est "malformé" ou manquant, on prévient le client
            return $this->json(
                ['error' => 'JSON invalide'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        // Valider l'entité
        // @link : https://symfony.com/doc/current/validation.html#using-the-validator-service
        $errors = $validator->validate($user);

        // Y'a-t-il des erreurs ?
        if (count($errors) > 0) {
            // tableau de retour
            $errorsClean = [];
            // @Retourner des erreurs de validation propres
            /** @var ConstraintViolation $error */
            foreach ($errors as $error) {
                $errorsClean[$error->getPropertyPath()][] = $error->getMessage();
            };

            return $this->json($errorsClean, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // On sauvegarde l'entité
        $entityManager = $doctrine->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        // On retourne la réponse adaptée (201 + Location: URL de la ressource)
        return $this->json(
            // Le film créé peut être ajouté au retour
            $user,
            // Le status code : 201 CREATED
            // utilisons les constantes de classes !
            Response::HTTP_CREATED,
            // REST demande un header Location + URL de la ressource
            [
                // Nom de l'en-tête + URL
                //'Location' => $this->generateUrl('api_movies_get_item', ['id' => $user->getId()])
            ],
            // Groups
            ['groups' => 'get_user_item']
        );
    }
}
