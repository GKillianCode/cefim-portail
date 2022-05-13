<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($p = 0, $pMax = 25; $p < $pMax; $p++) {
            $user = new User();

            $user->setLastName($faker->name())
                ->setFirstName($faker->firstName());

            $manager->persist($user);
        }

        $manager->flush();
    }
}