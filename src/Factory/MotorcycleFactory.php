<?php

namespace App\Factory;

use App\Entity\Motorcycle;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Motorcycle>
 */
final class MotorcycleFactory extends PersistentProxyObjectFactory
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
        return Motorcycle::class;
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
            'colour' => self::faker()->colorName(),
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
            // ->afterInstantiate(function(Motorcycle $motorcycle): void {})
        ;
    }
}
