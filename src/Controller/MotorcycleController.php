<?php

namespace App\Controller;

use App\Entity\Motorcycle;
use App\Repository\MotorcycleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MotorcycleController extends AbstractController
{

    #[Route('/motocycle/{id}', name: 'motocycle_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $motocycle = $entityManager->getRepository(MotorcycleRepository::class)->find($id);

        if (!$motocycle) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$motocycle->getBrand());
    }
}
