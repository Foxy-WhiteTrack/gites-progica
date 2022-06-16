<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use App\Entity\Gite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GitesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $gite = new Gite();
            $gite
                ->setNom('Gite' . $i)
                ->setDescription("Gite numéro " . $i)
                ->setSurface(random_int(50, 200))
                ->setChambre(random_int(1, 10))
                ->setCouchage(random_int(3, 15));

            $manager->persist($gite);
        }
        $equip1 = new Equipement();
        $equip1->setName('lave-linge');

        $manager->flush();
    }
}
