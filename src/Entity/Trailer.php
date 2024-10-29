<?php

namespace App\Entity;

use App\Repository\TrailerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrailerRepository::class)]
class Trailer extends BaseVehicle
{
    #[ORM\Column]
    #[Assert\NotBlank(message: 'Load capacity cannot be empty.')]
    #[Assert\Type(
        type: 'integer',
        message: 'Load capacity must be an integer.'
    )]
    private ?int $load_kapacity_kg = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Number of axles cannot be empty.')]
    #[Assert\Choice(
        choices: [1, 2, 3],
        message: 'Number of axles must be 1, 2, or 3.'
    )]
    private ?int $axles_number = null;

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

    public function getLoadKapacityKg(): ?int
    {
        return $this->load_kapacity_kg;
    }

    public function setLoadKapacityKg(int $load_kapacity_kg): static
    {
        $this->load_kapacity_kg = $load_kapacity_kg;

        return $this;
    }

    public function getAxlesNumber(): ?int
    {
        return $this->axles_number;
    }

    public function setAxlesNumber(int $axles_number): static
    {
        $this->axles_number = $axles_number;

        return $this;
    }
}
