<?php


namespace App\Controller\Heroes;


use App\Entity\BlogCategory;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BlogController
 * @package App\Controller\Heroes
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    /**
     * Page Accueil du Blog
     * @Route("/", name="blog_index", methods={"GET"})
     * @return Response
     */
    public function index()
    {
        # Afficher les dernières publication par ordre DESC
        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findBy([],['created_at' => 'DESC'], 
            ['limit' => 4]);

        return $this->render('heroes/blog/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * Afficher les articles d'une categorie
     * @Route("/category/{id}", name="blog_category", methods={"GET"})
     * @param BlogCategory $category
     * @return Response
     */
    public function category(BlogCategory $category = null)
    {
        # Récupérer les articles de la catégorie
        $articles = $category->getPosts();
        
        # Transmission a la vue
        return $this->render('post/index.html.twig', [
            'posts' => $articles
        ]);
    }

    /**
     * Afficher un Article en Particulier
     * @Route("/article/{id}", name="blog_article", methods={"GET"})
     * @param Post|null $post
     * @return Response
     */
    public function post(Post $post = null)
    {
        return $this->render('post/show.html.twig', [
            'post' => $post
        ]);
    }
}