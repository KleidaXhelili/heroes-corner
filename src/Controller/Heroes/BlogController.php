<?php


namespace App\Controller\Heroes;


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
            ->findBy([],['id' => 'DESC']);

        return $this->render('heroes/blog/index.html.twig', [
            'posts' => $posts
        ]);
    }
}