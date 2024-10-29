<?php

namespace App\Factory;

use App\Entity\Car;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Car>
 */
final class CarFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Car::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'brand' => self::faker()->company(),
            'car_category' => self::faker()->randomElement(['sedan', 'hatchback', 'suv', 'coupe', 'convertible', 'wagon']),
            'colour' => self::faker()->colorName(),
            'door_numbers' => self::faker()->numberBetween(3, 5),
            'engine_capacity' => self::faker()->randomFloat(2, 10, 500),
            'model' => self::faker()->word(),
            'price' => self::faker()->randomFloat(2, 10000, 50000),
            'quantity' => self::faker()->numberBetween(0, 100),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Car $car): void {})
        ;
    }
}
