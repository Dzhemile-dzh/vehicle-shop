<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Motorcycle;
use App\Entity\Trailer;
use App\Entity\Truck;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseVehicleController extends AbstractController
{
    protected function handleCreate(
        Request $request,
        EntityManagerInterface $em,
        string $entityClass,
        string $formClass,
        string $routeName,
        string $template,
    ): Response {
        $entity = new $entityClass();
        $form = $this->createForm($formClass, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute($routeName);
        }

        return $this->render($template, [
            'form' => $form->createView(),
        ]);
    }

    protected function handleList(EntityManagerInterface $em, string $entityClass, string $template): Response
    {
        $entities = $em->getRepository($entityClass)->findAll();

        return $this->render($template, [
            'vehicles' => $entities,
        ]);
    }

    protected function handleDetails(int $id, EntityManagerInterface $em, string $entityClass, string $template, array $additionalParams = []): Response
    {
        $entity = $em->getRepository($entityClass)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('The vehicle does not exist');
        }

        $params = array_merge($additionalParams, [
            'vehicle' => $entity,
        ]);
        return $this->render($template, $params);
    }

    protected function handleFollow(Request $request, EntityManagerInterface $em, $entity, string $routeName): RedirectResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        $entityClass = get_class($entity);

        switch ($entityClass) {
            case Car::class:
                $isFollowingMethod = 'isFollowingCar';
                $followMethod = 'followCar';
                break;
            case Motorcycle::class:
                $isFollowingMethod = 'isFollowingMotorcycle';
                $followMethod = 'followMotorcycle';
                break;
            case Trailer::class:
                $isFollowingMethod = 'isFollowingTrailer';
                $followMethod = 'followTrailer';
                break;
            case Truck::class:
                $isFollowingMethod = 'isFollowingTruck';
                $followMethod = 'followTruck';
                break;
            default:
                throw new \LogicException('Unknown entity type for following.');
        }

        if (!$user->$isFollowingMethod($entity)) {
            $user->$followMethod($entity);
            $em->persist($user);
            $em->flush();
        }

        return $this->redirectToRoute($routeName);
    }

    protected function handleUnfollow(Request $request, EntityManagerInterface $em, $entity, string $routeName): RedirectResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($user) {
            $entityClass = get_class($entity);

            switch ($entityClass) {
                case Car::class:
                    $unfollowMethod = 'unfollowCar';
                    break;
                case Motorcycle::class:
                    $unfollowMethod = 'unfollowMotorcycle';
                    break;
                case Trailer::class:
                    $unfollowMethod = 'unfollowTrailer';
                    break;
                case Truck::class:
                    $unfollowMethod = 'unfollowTruck';
                    break;
                default:
                    throw new \LogicException('Unknown entity type for unfollowing.');
            }

            if ($user->{'isFollowing'.(new \ReflectionClass($entity))->getShortName()}($entity)) {
                $user->$unfollowMethod($entity);
                $em->persist($user);
                $em->flush();
            }
        }

        return $this->redirectToRoute($routeName);
    }
}
