<?php

namespace App\DataFixtures;

use App\Entity\Filiere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class FiliereFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /*$faker = Factory::create('fr_FR');

        for ($p = 0, $pMax = 25; $p < $pMax; $p++) {
            $filiere = new Filiere();

            $filiere->setNom($faker->word());


            $manager->persist($filiere);
        }

        $manager->flush();*/
    }
}
