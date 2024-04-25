<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('admin/article', name: 'admin.article.')]
class ArticleController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('Admin/Article/index.html.twig');
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(): Response
    {
        return $this->render('Admin/Article/create.html.twig');
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => Requirement::DIGITS])]
    public function edit(): Response
    {
        return $this->render('Admin/Article/edit.html.twig');
    }

    #[Route('/delete', name: 'delete', methods: ['DELETE'])]
    public function delete(): Response
    {
        return $this->render('Admin/Article/_delete.html.twig');
    }
}