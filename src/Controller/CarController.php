<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

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

    #[Route('/car/{id}/follow', name: 'car_follow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function follow(Car $car, EntityManagerInterface $em): RedirectResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        if (!$user->isFollowingCar($car)) {
            $user->followCar($car);
            $em->persist($user);
            $em->flush();
        }

        return $this->redirectToRoute('car_list');
    }

    #[Route('/car/{id}/unfollow', name: 'car_unfollow', methods: ['POST'])]
    #[IsGranted('ROLE_BUYER')]
    public function unfollow(Car $car, EntityManagerInterface $em): RedirectResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($user->isFollowingCar($car)) {
            $user->unfollowCar($car);
            $em->persist($user);
            $em->flush();
        }

        return $this->redirectToRoute('car_list');
    }
}
