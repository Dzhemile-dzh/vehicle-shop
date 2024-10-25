<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Brand cannot be empty.")]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Model cannot be empty.")]
    private ?string $model = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: "Engine capacity cannot be empty.")]
    #[Assert\Type(
        type: 'numeric',
        message: "Engine capacity must be a number."
    )]
    private ?string $engine_capacity = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Colour cannot be empty.")]
    private ?string $colour = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Number of doors cannot be empty.")]
    #[Assert\Range(
        min: 3,
        max: 5,
        notInRangeMessage: "Number of doors must be between 3 and 5."
    )]
    private ?int $door_numbers = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Car category cannot be empty.")]
    #[Assert\Choice(
        choices: ["sedan", "hatchback", "suv", "coupe", "convertible", "wagon"],
        message: "Choose a valid car category."
    )]
    private ?string $car_category = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: "Price cannot be empty.")]
    #[Assert\Type(
        type: 'numeric',
        message: "Price must be a number."
    )]
    private ?string $price = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Quantity cannot be empty.")]
    #[Assert\Type(
        type: 'integer',
        message: "Quantity must be an integer."
    )]
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

    public function getDoorNumbers(): ?int
    {
        return $this->door_numbers;
    }

    public function setDoorNumbers(int $door_numbers): static
    {
        $this->door_numbers = $door_numbers;

        return $this;
    }

    public function getCarCategory(): ?string
    {
        return $this->car_category;
    }

    public function setCarCategory(string $car_category): static
    {
        $this->car_category = $car_category;

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
