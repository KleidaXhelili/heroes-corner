<?php


namespace App\Controller\Heroes;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Response;

class DefaultController extends AbstractController
{

    /**
     * Accéder à la page d'entrée
     * @Route("/", name="default_entry", methods={"GET"})
     */
    public function entryPage()
    {
        return $this->render("default/entry.html.twig");
    }

}