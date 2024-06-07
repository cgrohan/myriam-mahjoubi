<?php

namespace App\Controller\Page;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(MailerInterface $mailer ,Request $request): Response
    {
        $data = new ContactDTO();

        $form = $this->createForm(ContactType::class, $data);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $email = (new TemplatedEmail())
                ->from($data->email)
                ->to('test@test.fr')
                ->htmlTemplate('mailer/_template_mail.html.twig')
                ->context([
                    'data' => $data
                ])
                ->subject('Demande de contact')
                ;

                $mailer->send($email);

                $this->addFlash('success', 'Nous avons bien reçu votre message.');
                return $this->redirectToRoute('home');

            } catch (TransportExceptionInterface){
                $this->addFlash('danger', 'Votre mail n\'a pas pu s\'envoyer.');
            }
        } 

        return $this->render('Page/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/article/{slug}', name: 'article.show', requirements: ['slug' => Requirement::ASCII_SLUG])]
    public function show(): Response
    {
        return $this->render('Page/article.html.twig');
    }
}