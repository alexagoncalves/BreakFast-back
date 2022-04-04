<?php

namespace App\DataFixtures;

use App\Entity\Bakery;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();

        // Liste des catégories stockée dans un tableau
        $categories = [
            'gâteaux',
            'viennoiseries',
            'snacks',
            'pain',
            'boissons_fraîches',
            'boissons_chaudes',
            'bonbons',
        ];

        // Contient les objets des catégories crée
        $categoryObjects = [];

        // parcourir le tableau des categories
        foreach ($categories as $currentCategory) {
            $category = new Category();
            $category->setName($currentCategory);

            $categoryObjects[] = $category;
            $manager->persist($category);
        }

        // Liste des boulangeries aléatoires avec faker
        $bakeryNumber = 15;
        $bakeryObjects = [];

        // Boucle pour créer le nombre de boulangeries demandées
        for ($i = 0; $i < $bakeryNumber; $i++) {
            $bakery = new Bakery();
            $bakery->setName($faker->name());
            $bakery->setAddress($faker->address());
            $bakery->setProfileImg('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $bakery->setPhoneNumber($faker->phone_number());
            $bakery->setRating($faker->rating());
            $bakery->setStatus($faker->status());
            $bakery->setDeliveryFees($faker->delivery_fees());
            $bakery->setDeliveryTime($faker->delivery_time());

            $bakeryObjects[] = $bakery;
            $manager->persist($bakery);
        }

        // Liste des products
        $productNumber = 30;
        $productObjects = [];

        for ($i = 0; $i < $productNumber; $i++) {
            $product = new Product;
            $product->setName($faker->name());
            $product->setPrice($faker->price());
            $product->setDescription($faker->description());
            $product->setPicture('https://picsum.photos/id/' . ($i + 1) . '/200/300');

            $productObjects[] = $product;
            $manager->persist($product);

            // Liste des tags stockée dans un tableau
            $tags = [
                'bio',
                'vegan',
                'sans_gluten',
                'anniversaire',
            ];

            // Contient les objets des tags crée
            $tagObjects = [];

            // parcourir le tableau des tags
            foreach ($tags as $currentTag) {
                $tag = new Tag();
                $tag->setName($currentTag);

                $tagObjects[] = $tag;
                $manager->persist($tag);
            }

            $user = new User();
            $user->setEmail('admin@admin.com');
            $user->setAddress($faker->address());
            $user->setName($faker->name());
            $user->setZipCode($faker->zip_code());
            $user->setPassword('$2y$13$A/CUvaxJfGqkKZhZ2TfiHOA0q4hlDhDmMkMRXMaNLLs7wcaXkhQZ2');
            // password is admin
            // $2y$13$mc9q6YGcasPeb4aYFMPanOnCql.LjbtbANDDghzZn/UVGm1l7MheG
            $user->setRole('ROLE_ADMIN');

            $manager->persist($user);

            $manager->flush();
        }
    }
}
