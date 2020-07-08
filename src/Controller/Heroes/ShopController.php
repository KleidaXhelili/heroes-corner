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
        return $this->render('heroes/shop/index.html.twig');
    }

    # TODO Une fonction pour afficher les produits d'une categorie
    # TODO Une fonction pour afficher un produit
    # TODO Une fonction pour afficher le panier
}