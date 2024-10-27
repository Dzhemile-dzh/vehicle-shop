<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/car/new', name: 'car_create')]
    #[IsGranted('ROLE_MERCHANT')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($car);
            $em->flush();

            return $this->redirectToRoute('car_list');
        }

        return $this->render('car/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // src/Controller/CarController.php
    #[Route('/cars', name: 'car_list')]
    public function list(EntityManagerInterface $em): Response
    {
        $cars = $em->getRepository(Car::class)->findAll();

        return $this->render('car/list.html.twig', [
            'cars' => $cars,
        ]);
    }

    // src/Controller/CarController.php
    #[Route('/car/{id}', name: 'car_details')]
    public function details(int $id, EntityManagerInterface $em): Response
    {
        $car = $em->getRepository(Car::class)->find($id);

        if (!$car) {
            throw $this->createNotFoundException('The car does not exist');
        }

        return $this->render('car/details.html.twig', [
            'car' => $car,
        ]);
    }
}
