<?php

namespace App\Entity;

use App\Repository\TrailerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrailerRepository::class)]
class Trailer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $load_kapacity_kg = null;

    #[ORM\Column]
    private ?int $axles_number = null;

    #[ORM\Column]
    private ?int $quantity = null;

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
