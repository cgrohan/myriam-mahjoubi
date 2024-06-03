<?php

namespace App\Controller\Page;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('Page/index.html.twig');
    }

    #[Route('/article/{slug}', name: 'article.show', requirements: ['slug' => Requirement::ASCII_SLUG])]
    public function show(): Response
    {
        return $this->render('Page/article.html.twig');
    }
}