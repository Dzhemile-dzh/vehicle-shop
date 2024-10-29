<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('main/homepage.html.twig', [
            'followedVehicles' => $this->getFollowedVehicles(),
        ]);
    }

    #[IsGranted('ROLE_BUYER')]
    #[Route('/followed', name: 'followed_list')]
    public function followed(): Response
    {
        return $this->render('followed/list.html.twig', [
            'followedVehicles' => $this->getFollowedVehicles(),
        ]);
    }

    /**
     * Fetches followed vehicles for the authenticated user and returns a structured array.
     */
    private function getFollowedVehicles(): array
    {
        /** @var User $user */
        $user = $this->getUser();

        if (!$user) {
            return [];
        }

        return [
            ['type' => 'Car', 'items' => $user->getFollowedCars(), 'route' => 'car_details'],
            ['type' => 'Truck', 'items' => $user->getFollowedTrucks(), 'route' => 'truck_details'],
            ['type' => 'Trailer', 'items' => $user->getFollowedTrailers(), 'route' => 'trailer_details'],
            ['type' => 'Motorcycle', 'items' => $user->getFollowedMotorcycles(), 'route' => 'motorcycle_details'],
        ];
    }
}
