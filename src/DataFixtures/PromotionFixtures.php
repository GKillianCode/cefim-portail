<?php

namespace App\DataFixtures;

use App\Entity\Filiere;
use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $filieres = [];

        for ($p = 0, $pMax = 25; $p < $pMax; $p++) {
            $filiere = new Filiere();

            $filiere->setNom($faker->word());
            $filieres[] = $filiere;
            $manager->persist($filiere);
        }

        for ($p = 0, $pMax = 25; $p < $pMax; $p++) {
            $promotion = new Promotion();

            $promotion->setNom($faker->year().$faker->word())

            ->setIdFiliere($filieres[array_rand($filieres)]);
            $manager->persist($promotion);
        }

        $manager->flush();
    }
}
