<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BlogPostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $post = new Post();
        $post->setCreatedAt(new \DateTimeImmutable())
            ->setTitre("Lorem ipsum dolor sit amet, consectetur adipiscing elit.")
            ->setContenu("<p>Nullam finibus nisl sed tincidunt ultrices. Nulla vulputate at erat at auctor. Vivamus varius eu lorem eget bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque diam mauris, tincidunt id dui et, fringilla rhoncus diam. Mauris pulvinar malesuada ex, et iaculis dui sagittis eu. Curabitur iaculis est nunc, eget fringilla urna faucibus id.</p><p>Etiam ante erat, accumsan a luctus vitae, dapibus quis nisi. In dignissim ante maximus libero hendrerit consequat. Nulla facilisi. Phasellus mi sem, consequat ac risus non, elementum vestibulum nisi. Vivamus in risus eget felis ornare aliquet. Cras egestas, felis in commodo efficitur, mi erat fermentum nunc, vitae ultricies dui mauris vel urna. Vestibulum commodo ex metus, sit amet accumsan nunc feugiat quis. Vivamus blandit sagittis ornare. Ut sed ligula metus. Curabitur dictum enim at est sodales pellentesque. In vel risus mollis, hendrerit quam id, tincidunt ante. Maecenas quis nulla nec elit feugiat maximus. Etiam leo elit, lobortis ut bibendum dignissim, ornare non erat.</p>")
            ->setBlogCategory($this->getReference(BlogCategorieFixtures::CATEGORIE_ACTUALITE))
            ->setAuteur($this->getReference(HeroesUserFixtures::ADMIN_USER_REFERENCE));

        $manager->persist($post);

        $post2 = new Post();
        $post2->setCreatedAt(new \DateTimeImmutable())
            ->setTitre("Lorem ipsum dolor sit amet, consectetur adipiscing elit.")
            ->setContenu("<p>Nullam finibus nisl sed tincidunt ultrices. Nulla vulputate at erat at auctor. Vivamus varius eu lorem eget bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque diam mauris, tincidunt id dui et, fringilla rhoncus diam. Mauris pulvinar malesuada ex, et iaculis dui sagittis eu. Curabitur iaculis est nunc, eget fringilla urna faucibus id.</p><p>Etiam ante erat, accumsan a luctus vitae, dapibus quis nisi. In dignissim ante maximus libero hendrerit consequat. Nulla facilisi. Phasellus mi sem, consequat ac risus non, elementum vestibulum nisi. Vivamus in risus eget felis ornare aliquet. Cras egestas, felis in commodo efficitur, mi erat fermentum nunc, vitae ultricies dui mauris vel urna. Vestibulum commodo ex metus, sit amet accumsan nunc feugiat quis. Vivamus blandit sagittis ornare. Ut sed ligula metus. Curabitur dictum enim at est sodales pellentesque. In vel risus mollis, hendrerit quam id, tincidunt ante. Maecenas quis nulla nec elit feugiat maximus. Etiam leo elit, lobortis ut bibendum dignissim, ornare non erat.</p>")
            ->setBlogCategory($this->getReference(BlogCategorieFixtures::CATEGORIE_INTERVIEW))
            ->setAuteur($this->getReference(HeroesUserFixtures::ADMIN_USER_REFERENCE));

        $manager->persist($post2);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            BlogCategorieFixtures::class,
            HeroesUserFixtures::class,
        );
    }
}
