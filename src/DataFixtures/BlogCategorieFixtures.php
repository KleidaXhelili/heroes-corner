<?php

namespace App\DataFixtures;

use App\Entity\BlogCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogCategorieFixtures extends Fixture
{
    const CATEGORIE_INTERVIEW = "categorie_interview";
    const CATEGORIE_ACTUALITE = "categorie_actualite";


    public function load(ObjectManager $manager)
    {

        $blogCategorie = new BlogCategory();
        $blogCategorie->setTitle("Actualités");
        $manager->persist($blogCategorie);

        $blogCategorie2 = new BlogCategory();
        $blogCategorie2->setTitle("Interviews");
        $manager->persist($blogCategorie2);

        $manager->flush();

        $this->addReference(self::CATEGORIE_INTERVIEW, $blogCategorie2);
        $this->addReference(self::CATEGORIE_ACTUALITE, $blogCategorie);
    }
}
