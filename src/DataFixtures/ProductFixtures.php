<?php


namespace App\DataFixtures;


use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {

        $categorie = new Category();
        $categorie->setTitre('Manga');
        $manager->persist($categorie);

        $categorie2 = new Category();
        $categorie2->setTitre('Comics');
        $manager->persist($categorie2);

        $categorie3 = new Category();
        $categorie3->setTitre('BD');
        $manager->persist($categorie3);

        for ($i = 0; $i < 5; $i++) {
            $product = new Product();
            $product->setTitre('product ' . $i)
                ->setCategorie($categorie)
                ->SetDessinateur('lorem ipsum')
                ->SetScenariste('lorem ipsum')
                ->SetEditeur('lorem ipsum')
                ->SetResume('lorem ipsum')
                ->SetPrix(mt_rand(10,100))
                ->setDate(new \DateTimeImmutable())
                ->SetNote(mt_rand(0,10));

            $manager->persist($product);
        }

        for ($i = 5; $i < 10; $i++) {
            $product = new Product();
            $product->setTitre('product ' . $i)
                ->setCategorie($categorie2)
                ->SetDessinateur('lorem ipsum')
                ->SetScenariste('lorem ipsum')
                ->SetEditeur('lorem ipsum')
                ->SetResume('lorem ipsum')
                ->SetPrix(mt_rand(10,100))
                ->setDate(new \DateTimeImmutable())
                ->SetNote(mt_rand(0,10));

            $manager->persist($product);
        }

        for ($i = 10; $i < 15; $i++) {
            $product = new Product();
            $product->setTitre('product ' . $i)
                ->setCategorie($categorie3)
                ->SetDessinateur('lorem ipsum')
                ->SetScenariste('lorem ipsum')
                ->SetEditeur('lorem ipsum')
                ->SetResume('lorem ipsum')
                ->SetPrix(mt_rand(10,100))
                ->setDate(new \DateTimeImmutable())
                ->SetNote(mt_rand(0,10));

            $manager->persist($product);
        }

        $manager->flush();
    }
}