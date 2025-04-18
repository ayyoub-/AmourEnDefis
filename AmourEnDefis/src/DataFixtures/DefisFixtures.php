<?php

namespace App\DataFixtures;

use App\Entity\CategorieDefi;
use App\Entity\Defis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class DefisFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Créer quelques catégories d'abord
        $categories = [];
        $titres = ['Communication', 'Romantique', 'Fun', 'Développement personnel'];

        foreach ($titres as $titre) {
            $categorie = new CategorieDefi();
            $categorie->setTitre($titre);
            $manager->persist($categorie);
            $categories[] = $categorie;
        }

        // Créer des défis aléatoires
        for ($i = 0; $i < 20; $i++) {
            $defi = new Defis();
            $defi->setTitre('Défi : ' . ucfirst($faker->words(3, true)))
                ->setDescription($faker->paragraph())
                ->setCategorie($faker->randomElement($categories));

            $manager->persist($defi);
        }

        $manager->flush();
    }
}
