<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $username = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    private $plainPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    #[ORM\ManyToMany(targetEntity: Car::class, inversedBy: 'followers')]
    #[ORM\JoinTable(name: 'user_followed_cars')]
    private Collection $followedCars;

    #[ORM\ManyToMany(targetEntity: Motorcycle::class, inversedBy: 'followers')]
    #[ORM\JoinTable(name: 'user_followed_motorscycle')]
    private Collection $followedMotorcycles;

    #[ORM\ManyToMany(targetEntity: Trailer::class, inversedBy: 'followers')]
    #[ORM\JoinTable(name: 'user_followed_trailer')]
    private Collection $followedTrailers;

    #[ORM\ManyToMany(targetEntity: Truck::class, inversedBy: 'followers')]
    #[ORM\JoinTable(name: 'user_followed_truck')]
    private Collection $followedTrucks;

    public function __construct()
    {
        // Other initializations...
        $this->followedCars = new ArrayCollection();
        $this->followedMotorcycles = new ArrayCollection();
        $this->followedTrailers = new ArrayCollection();
        $this->followedTrucks = new ArrayCollection();

    }

    public function getFollowedCars(): Collection
    {
        return $this->followedCars;
    }

    public function followCar(Car $car): void
    {
        if (!$this->followedCars->contains($car)) {
            $this->followedCars->add($car);
        }
    }

    public function unfollowCar(Car $car): void
    {
        if ($this->followedCars->contains($car)) {
            $this->followedCars->removeElement($car);
        }
    }

    public function isFollowingCar(Car $car): bool
    {
        return $this->followedCars->contains($car);
    }

    public function getFollowedMotorcycles(): Collection
    {
        return $this->followedMotorcycles;
    }

    public function followMotorcycle(Motorcycle $motorcycle): void
    {
        if (!$this->followedMotorcycles->contains($motorcycle)) {
            $this->followedMotorcycles->add($motorcycle);
        }
    }

    public function unfollowMotorcycle(Motorcycle $motorcycle): void
    {
        if ($this->followedMotorcycles->contains($motorcycle)) {
            $this->followedMotorcycles->removeElement($motorcycle);
        }
    }

    public function isFollowingMotorcycle(Motorcycle $motorcycle): bool
    {
        return $this->followedMotorcycles->contains($motorcycle);
    }
    
    public function getFollowedTrailers(): Collection
    {
        return $this->followedTrailers;
    }

    public function followTrailer(Trailer $trailer): void
    {
        if (!$this->followedTrailers->contains($trailer)) {
            $this->followedTrailers->add($trailer);
        }
    }

    public function unfollowTrailer(Trailer $trailer): void
    {
        if ($this->followedTrailers->contains($trailer)) {
            $this->followedTrailers->removeElement($trailer);
        }
    }

    public function isFollowingTrailer(Trailer $trailer): bool
    {
        return $this->followedTrailers->contains($trailer);
    }

    public function getFollowedTrucks(): Collection
    {
        return $this->followedTrucks;
    }

    public function followTruck(Truck $truck): void
    {
        if (!$this->followedTrucks->contains($truck)) {
            $this->followedTrucks->add($truck);
        }
    }

    public function unfollowTruck(Truck $truck): void
    {
        if ($this->followedTrucks->contains($truck)) {
            $this->followedTrucks->removeElement($truck);
        }
    }

    public function isFollowingTruck(Truck $truck): bool
    {
        return $this->followedTrucks->contains($truck);
    }
}
