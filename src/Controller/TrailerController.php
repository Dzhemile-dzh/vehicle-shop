<?php

namespace App\Controller;

use App\Entity\Trailer;
use App\Form\TrailerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrailerController extends AbstractController
{
    #[Route('/trailer/new', name: 'trailer_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $trailer = new Trailer();
        $form = $this->createForm(TrailerType::class, $trailer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($trailer);
            $em->flush();

            return $this->redirectToRoute('trailer_list');
        }

        return $this->render('trailer/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // src/Controller/trailerController.php
    #[Route('/trailers', name: 'trailer_list')]
    public function list(EntityManagerInterface $em): Response
    {
        $trailers = $em->getRepository(Trailer::class)->findAll();

        return $this->render('trailer/list.html.twig', [
            'trailers' => $trailers,
        ]);
    }

    // src/Controller/trailerController.php
    #[Route('/trailer/{id}', name: 'trailer_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        $trailer = $em->getRepository(Trailer::class)->find($id);

        if (!$trailer) {
            throw $this->createNotFoundException('The trailer does not exist');
        }

        return $this->render('trailer/details.html.twig', [
            'trailer' => $trailer,
        ]);
    }
}
