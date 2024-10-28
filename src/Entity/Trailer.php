<?php

namespace App\Entity;

use App\Repository\TrailerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrailerRepository::class)]
class Trailer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Brand cannot be empty.')]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Model cannot be empty.')]
    private ?string $model = null;

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

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: 'Price cannot be empty.')]
    #[Assert\Type(
        type: 'numeric',
        message: 'Price must be a number.'
    )]
    private ?string $price = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Quantity cannot be empty.')]
    #[Assert\Type(
        type: 'integer',
        message: 'Quantity must be an integer.'
    )]
    private ?int $quantity = null;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }
}
