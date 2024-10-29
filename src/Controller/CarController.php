<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CarController extends BaseVehicleController
{
    #[Route('/car/new', name: 'car_create')]
    #[IsGranted('ROLE_MERCHANT')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        return $this->handleCreate(
            $request, $em, Car::class, CarType::class, 'car_list', 'car/create.html.twig'
        );
    }

    #[Route('/cars', name: 'car_list')]
    public function list(EntityManagerInterface $em): Response
    {
        return $this->handleList($em, Car::class, 'car/list.html.twig');
    }

    #[Route('/car/{id}', name: 'car_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        return $this->handleDetails($id, $em, Car::class, 'vehicle/details.html.twig', [
            'vehicleType' => 'car',
        ]);
    }

    #[Route('/car/{id}/follow', name: 'car_follow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function follow(Request $request, Car $car, EntityManagerInterface $em): Response
    {
        return $this->handleFollow($request, $em, $car, 'car_list');
    }

    #[Route('/car/{id}/unfollow', name: 'car_unfollow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function unfollow(Request $request, Car $car, EntityManagerInterface $em): Response
    {
        return $this->handleUnfollow($request, $em, $car, 'car_list');
    }
}
