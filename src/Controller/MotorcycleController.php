<?php

namespace App\Controller;

use App\Entity\Motorcycle;
use App\Form\MotorcycleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MotorcycleController extends BaseVehicleController
{
    #[Route('/motorcycle/new', name: 'motorcycle_create')]
    #[IsGranted('ROLE_MERCHANT')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        return $this->handleCreate(
            $request, $em, Motorcycle::class, MotorcycleType::class, 'motorcycle_list', 'motorcycle/create.html.twig'
        );
    }

    #[Route('/motorcycles', name: 'motorcycle_list')]
    public function list(EntityManagerInterface $em): Response
    {
        return $this->handleList($em, Motorcycle::class, 'motorcycle/list.html.twig');
    }

    #[Route('/motorcycle/{id}', name: 'motorcycle_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        return $this->handleDetails($id, $em, Motorcycle::class,'vehicle/details.html.twig', [
            'vehicleType' => 'motorcycle', 
        ]);
    }

    #[Route('/motorcycle/{id}/follow', name: 'motorcycle_follow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function follow(Request $request, Motorcycle $motorcycle, EntityManagerInterface $em): Response
    {
        return $this->handleFollow($request, $em, $motorcycle, 'motorcycle_list');
    }

    #[Route('/motorcycle/{id}/unfollow', name: 'motorcycle_unfollow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function unfollow(Request $request, Motorcycle $motorcycle, EntityManagerInterface $em): Response
    {
        return $this->handleUnfollow($request, $em, $motorcycle, 'motorcycle_list');
    }
}
