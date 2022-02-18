<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/page", name="page")
     */
    public function index(): Response{
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/", name="inicio")
     */
    public function inicio(): Response{
        return $this->render("index.html.twig");
    }

    /**
     * @Route("/galeria", name="galeria")
     */
    public function galeria(): Response{
        return $this->render("galeria.html.twig");
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto(): Response{
        return $this->render("contacto.html.twig");
    }

    /**
     * @Route("/terminos", name="terminos")
     */
    public function terminos(): Response{
        return $this->render("terminos.html.twig");
    }

    /**
     * @Route("/avisoLegal", name="avisoLegal")
     */
    public function avisoLegal(): Response{
        return $this->render("avisoLegal.html.twig");
    }
}
