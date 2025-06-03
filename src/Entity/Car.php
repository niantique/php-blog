<?php

namespace App\Entity;
use App\Entity\Brand;

class Car {
    private ?int $id;
    private string $model;
    private int $year;
    private string $image;
    private Brand $brand;

    public function __construct(
        string $model,
        int $year,
        string $image,
        Brand $brand,
        ?int $id =null
    ) {
        $this->model = $model;
        $this->year = $year;
        $this->image = $image;
        $this->brand = $brand;
        $this->id = $id;
    }

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): self {
        $this->id=$id;
        return $this;
    }

    public function getModel(): string {
        return $this->model;
    }
    public function setModel(string $model): self {
        $this->model = $model;
        return $this;
    }

    public function getYear(): int {
        return $this->year;
    }
    public function setYear(int $year): self {
        $this->year = $year;
        return $this;
    }

    public function getImage(): string {
        return $this->image;
    }
    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }

    public function getBrand(): Brand {
        return $this->brand;
    }
    public function setBrand(Brand $brand): self {
        $this->brand = $brand;
        return $this;
    }

}

