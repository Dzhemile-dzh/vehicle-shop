<?php

namespace App\Factory;

use App\Entity\Trailer;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Trailer>
 */
final class TrailerFactory extends PersistentProxyObjectFactory
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
        return Trailer::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'axles_number' => self::faker()->numberBetween(1, 3),
            'brand' => self::faker()->company(),
            'load_kapacity_kg' => self::faker()->randomNumber(),
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
            // ->afterInstantiate(function(Trailer $trailer): void {})
        ;
    }
}
