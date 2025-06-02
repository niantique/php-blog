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
}

