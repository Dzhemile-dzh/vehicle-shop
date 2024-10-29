<?php

namespace App\Factory;

use App\Entity\Truck;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Truck>
 */
final class TruckFactory extends PersistentProxyObjectFactory
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
        return Truck::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'bed_numbers' => self::faker()->numberBetween(1, 2),
            'brand' => self::faker()->company(),
            'colour' => self::faker()->colorName(),
            'engine_capacity' => self::faker()->randomFloat(2, 10, 500),
            'model' => self::faker()->word(),
            'price' => self::faker()->randomFloat(2, 10000, 50000),
            'quantity' => self::faker()->numberBetween(1, 100),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Truck $truck): void {})
        ;
    }
}
