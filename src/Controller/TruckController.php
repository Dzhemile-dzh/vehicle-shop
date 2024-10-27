<?php

namespace App\Controller;

use App\Entity\Truck;
use App\Form\TruckType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TruckController extends AbstractController
{
    #[Route('/truck/new', name: 'truck_create')]
    #[IsGranted('ROLE_MERCHANT')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $truck = new Truck();
        $form = $this->createForm(TruckType::class, $truck);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($truck);
            $em->flush();

            return $this->redirectToRoute('truck_list');
        }

        return $this->render('truck/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // src/Controller/truckController.php
    #[Route('/trucks', name: 'truck_list')]
    public function list(EntityManagerInterface $em): Response
    {
        $trucks = $em->getRepository(Truck::class)->findAll();

        return $this->render('truck/list.html.twig', [
            'trucks' => $trucks,
        ]);
    }

    // src/Controller/truckController.php
    #[Route('/truck/{id}', name: 'truck_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        $truck = $em->getRepository(Truck::class)->find($id);

        if (!$truck) {
            throw $this->createNotFoundException('The truck does not exist');
        }

        return $this->render('truck/details.html.twig', [
            'truck' => $truck,
        ]);
    }
}
