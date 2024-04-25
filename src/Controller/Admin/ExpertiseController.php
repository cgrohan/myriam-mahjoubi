<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('admin/expertise', name: 'admin.expertise.')]
class ExpertiseController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('Admin/Expertise/index.html.twig');
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(): Response
    {
        return $this->render('Admin/Expertise/create.html.twig');
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => Requirement::DIGITS])]
    public function edit(): Response
    {
        return $this->render('Admin/Expertise/edit.html.twig');
    }

    #[Route('/delete', name: 'delete', methods: ['DELETE'])]
    public function delete(): Response
    {
        return $this->render('Admin/Expertise/_delete.html.twig');
    }
}