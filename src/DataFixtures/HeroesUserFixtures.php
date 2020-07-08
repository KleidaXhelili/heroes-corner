<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HeroesUserFixtures extends Fixture
{
    const ADMIN_USER_REFERENCE = "admin_user_reference";
    const USER_REFERENCE = "user_reference";

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setPrenom("Hugo")
            ->setNom("LIEGEARD")
            ->setEmail("admin@heroes.com")
            ->setPassword("test") # TODO Encode Password here
            ->setUsername("hugoliegeard")
            ->setNumero(12)
            ->setAdresse("Avenue du Pré")
            ->setCp(98789)
            ->setVille("Le Chenouille")
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $user = new User();
        $user->setPrenom("Agnès")
            ->setNom("DISSAKE")
            ->setEmail("agnes.dissake@heroes.com")
            ->setPassword("test") # TODO Encode Password here
            ->setUsername("agnesdissake")
            ->setNumero(48)
            ->setAdresse("Rue des Oliviers Fleurit")
            ->setCp(98789)
            ->setVille("La Pampada")
            ->setRoles(['ROLE_USER']);

        $manager->persist($user);

        $manager->flush();

        $this->addReference(self::ADMIN_USER_REFERENCE, $admin);
        $this->addReference(self::USER_REFERENCE, $user);
    }
}
