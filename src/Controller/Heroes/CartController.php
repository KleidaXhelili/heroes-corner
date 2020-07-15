<?php

namespace App\Controller\Heroes;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/shop/cart")
 */
class CartController extends AbstractController
{
    /**
     * @Route("/", name="cart_index", methods={"GET"})
     * @param CartService $cartService
     * @return Response
     */
    public function index(CartService $cartService)
    {

        return $this->render('cart/index.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * @Route("/add/{id}", name="cart_add", methods={"GET"})
     * @param $id
     * @param CartService $cartService
     * @return RedirectResponse
     */
    public function addCart($id, CartService $cartService)
    {
        $cartService->addCart($id);
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/remove/{id}", name="cart_remove")
     * @param $id
     * @param CartService $cartService
     * @return RedirectResponse
     */
    public function remove($id, CartService $cartService){

        $cartService->remove($id);
        return $this->redirectToRoute("cart_index");
    }
}