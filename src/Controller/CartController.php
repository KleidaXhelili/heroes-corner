<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/boutique/cart")
 */
class CartController extends AbstractController
{
    /**
     * @Route("/", name="cart_index", methods={"GET"})
     */
    public function index(CartService $cartService)
    {

        return $this->render('cart/index.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * @Route("/boutique/cart/add/{id}", name="cart_add", methods={"GET"})
     */
    public function addCart($id, CartService $cartService)
    {
        $cartService->addCart($id);
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/boutique/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService){

        $cartService->remove($id);
        return $this->redirectToRoute("cart_index");
    }
}