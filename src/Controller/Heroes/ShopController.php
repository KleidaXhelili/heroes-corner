<?php


namespace App\Controller\Heroes;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ShopController
 * @package App\Controller\Heroes
 * @Route("/shop")
 */
class ShopController extends AbstractController
{
    /**
     * Page Accueil de la Boutique
     * @Route("/", name="shop_index", methods={"GET"})
     * @return Response
     */
    public function index()
    {
        # Affichage des produits par ordre DESC
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy([],['id' => 'DESC']);

        return $this->render('heroes/shop/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * Affichage des produits d'une categorie
     * @Route("/category/{id}", name="shop_category", methods={"GET"})
     * @param Category $productCategory
     * @return Response
     */
    public function productCategory(Category $productCategory = null){

        $products = $productCategory->getProducts();

        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * Affichage d'un Produit en particulier
     * @Route("/product/{id}", name="shop_product", methods={"GET"})
     * @param Product|null $product
     * @return Response
     */
    public function product(Product $product = null){

        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }

    # ???? TODO Une fonction pour afficher le panier
}