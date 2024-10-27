<?php

namespace App\Controller;

use App\Entity\Motorcycle;
use App\Form\MotorcycleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotorcycleController extends AbstractController
{
    #[Route('/motorcycle/new', name: 'motorcycle_create')]
    #[IsGranted('ROLE_MERCHANT')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $motorcycle = new Motorcycle();
        $form = $this->createForm(MotorcycleType::class, $motorcycle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($motorcycle);
            $em->flush();

            return $this->redirectToRoute('motorcycle_list');
        }

        return $this->render('motorcycle/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // src/Controller/motorcycleController.php
    #[Route('/motorcycles', name: 'motorcycle_list')]
    public function list(EntityManagerInterface $em): Response
    {
        $motorcycles = $em->getRepository(Motorcycle::class)->findAll();

        return $this->render('motorcycle/list.html.twig', [
            'motorcycles' => $motorcycles,
        ]);
    }

    // src/Controller/motorcycleController.php
    #[Route('/motorcycle/{id}', name: 'motorcycle_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        $motorcycle = $em->getRepository(Motorcycle::class)->find($id);

        if (!$motorcycle) {
            throw $this->createNotFoundException('The motorcycle does not exist');
        }

        return $this->render('motorcycle/details.html.twig', [
            'motorcycle' => $motorcycle,
        ]);
    }
}
