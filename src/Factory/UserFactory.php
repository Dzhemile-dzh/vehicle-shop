<?php

namespace App\Factory;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<User>
 */
final class UserFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();
        $this->passwordHasher = $passwordHasher;
    }

    public static function class(): string
    {
        return User::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'username' => self::faker()->unique()->userName(),
            'firstname' => self::faker()->firstName(),
            'email' => self::faker()->unique()->email(),
            'roles' => ['ROLE_BUYER'], 
            'plainPassword' => 'tada', // Default password
        ];
    }

    public static function createSpecificUsers(): void
    {
        // Create a buyer
        self::createOne([
            'username' => 'buyer',
            'firstname' => 'Neivan',
            'email' => self::faker()->unique()->email(),
            'roles' => ['ROLE_BUYER'],
            'plainPassword' => 'tada',
        ]);

        // Create a merchant
        self::createOne([
            'username' => 'merchant',
            'firstname' => 'Nestoyan',
            'email' => self::faker()->unique()->email(),
            'roles' => ['ROLE_MERCHANT'],
            'plainPassword' => 'tada',
        ]);
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            ->afterInstantiate(function (User $user) {
                if ($user->getPlainPassword()) {
                    $user->setPassword(
                        $this->passwordHasher->hashPassword($user, $user->getPlainPassword())
                    );
                }
            })
        ;
    }
}
