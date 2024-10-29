<?php

namespace App\DataFixtures;

use App\Factory\CarFactory;
use App\Factory\MotorcycleFactory;
use App\Factory\TrailerFactory;
use App\Factory\TruckFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create vehicles
        CarFactory::createMany(10);
        MotorcycleFactory::createMany(10);
        TrailerFactory::createMany(10);
        TruckFactory::createMany(10);
        
        // Create users
        UserFactory::createSpecificUsers();
        UserFactory::createOne(['username' => 'dzhemile']);
        UserFactory::createMany(10);
        $manager->flush();
    }
}
