<?php

namespace App\Entity;

use App\Repository\TruckRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TruckRepository::class)]
class Truck extends BaseVehicle
{
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: 'Engine capacity cannot be empty.')]
    #[Assert\Type(
        type: 'numeric',
        message: 'Engine capacity must be a number.'
    )]
    private ?string $engine_capacity = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Colour cannot be empty.')]
    private ?string $colour = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Number of beds cannot be empty.')]
    #[Assert\Choice(
        choices: [1, 2],
        message: 'Number of beds must be either 1 or 2.'
    )]
    private ?int $bed_numbers = null;

    #[ORM\OneToMany(mappedBy: 'truck', targetEntity: Favorite::class, orphanRemoval: true)]
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
        return $this->engine_capacity;
    }

    public function setEngineCapacity(string $engine_capacity): static
    {
        $this->engine_capacity = $engine_capacity;

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

    public function getBedNumbers(): ?int
    {
        return $this->bed_numbers;
    }

    public function setBedNumbers(int $bed_numbers): static
    {
        $this->bed_numbers = $bed_numbers;

        return $this;
    }
}
