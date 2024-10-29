<?php

namespace App\Entity;

use App\Repository\MotorcycleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MotorcycleRepository::class)]
class Motorcycle extends BaseVehicle
{
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: 'Engine capacity cannot be empty.')]
    #[Assert\Type(
        type: 'numeric',
        message: 'Engine capacity must be a number.'
    )]
    private ?string $engineCapacity = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Colour cannot be empty.')]
    private ?string $colour = null;

    #[ORM\OneToMany(mappedBy: 'motorcycle', targetEntity: Favorite::class, orphanRemoval: true)]
    private Collection $favorites;

    public function __construct()
    {
        $this->favorites = new ArrayCollection();
    }

    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function getEngineCapacity(): ?string
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(string $engineCapacity): static
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    public function getColour(): ?string
    {
        return $this->colour;
    }

    public function setColour(string $colour): static
    {
        $this->colour = $colour;

        return $this;
    }
}
