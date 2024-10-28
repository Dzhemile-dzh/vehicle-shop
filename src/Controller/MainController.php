<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        // Fetch followed vehicles for the authenticated user
        $followedCars = $user ? $user->getFollowedCars() : [];
        $followedMotorcycles = $user ? $user->getFollowedMotorcycles() : [];
        $followedTrailers = $user ? $user->getFollowedTrailers() : [];
        $followedTrucks = $user ? $user->getFollowedTrucks() : [];

        $followedVehicles = [
            ['type' => 'Car', 'items' => $followedCars, 'route' => 'car_details'],
            ['type' => 'Truck', 'items' => $followedTrucks, 'route' => 'truck_details'],
            ['type' => 'Trailer', 'items' => $followedTrailers, 'route' => 'trailer_details'],
            ['type' => 'Motorcycle', 'items' => $followedMotorcycles, 'route' => 'motorcycle_details'],
        ];

        return $this->render('main/homepage.html.twig', [
            'followedVehicles' => $followedVehicles,
        ]);
    }
}
