<?php

namespace App\Controller;

use App\Entity\Truck;
use App\Form\TruckType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class TruckController extends BaseVehicleController
{
    #[Route('/truck/new', name: 'truck_create')]
    #[IsGranted('ROLE_MERCHANT')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        return $this->handleCreate(
            $request, $em, Truck::class, TruckType::class, 'truck_list', 'truck/create.html.twig'
        );
    }

    #[Route('/trucks', name: 'truck_list')]
    public function list(EntityManagerInterface $em): Response
    {
        return $this->handleList($em, Truck::class, 'truck/list.html.twig');
    }

    #[Route('/truck/{id}', name: 'truck_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        return $this->handleDetails($id, $em, Truck::class, 'vehicle/details.html.twig', [
            'vehicleType' => 'truck', 
        ]);
    }

    #[Route('/truck/{id}/follow', name: 'truck_follow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function follow(Request $request, Truck $truck, EntityManagerInterface $em): Response
    {
        return $this->handleFollow($request, $em, $truck, 'truck_list');
    }

    #[Route('/truck/{id}/unfollow', name: 'truck_unfollow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function unfollow(Request $request, Truck $truck, EntityManagerInterface $em): Response
    {
        return $this->handleUnfollow($request, $em, $truck, 'truck_list');
    }
}
