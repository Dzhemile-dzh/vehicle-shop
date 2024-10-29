<?php

namespace App\Controller;

use App\Entity\Trailer;
use App\Form\TrailerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class TrailerController extends BaseVehicleController
{
    #[Route('/trailer/new', name: 'trailer_create')]
    #[IsGranted('ROLE_MERCHANT')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        return $this->handleCreate(
            $request, $em, Trailer::class, TrailerType::class, 'trailer_list', 'trailer/create.html.twig'
        );
    }

    #[Route('/trailers', name: 'trailer_list')]
    public function list(EntityManagerInterface $em): Response
    {
        return $this->handleList($em, Trailer::class, 'trailer/list.html.twig');
    }

    #[Route('/trailer/{id}', name: 'trailer_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        return $this->handleDetails($id, $em, Trailer::class, 'vehicle/details.html.twig', [
            'vehicleType' => 'trailer', 
        ]);
    }

    #[Route('/trailer/{id}/follow', name: 'trailer_follow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function follow(Request $request, Trailer $trailer, EntityManagerInterface $em): Response
    {
        return $this->handleFollow($request, $em, $trailer, 'trailer_list');
    }

    #[Route('/trailer/{id}/unfollow', name: 'trailer_unfollow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function unfollow(Request $request, Trailer $trailer, EntityManagerInterface $em): Response
    {
        return $this->handleUnfollow($request, $em, $trailer, 'trailer_list');
    }
}
