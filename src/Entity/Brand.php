<?php

namespace App\Entity;
use App\Entity\Car;

class Brand {
    private ?int $id;
    private string $name;
    private string $origin;
    private string $description;

    public function __construct(
        string $name,
        string $origin,
        string $description,
        ?int $id =null
    ) {
        $this->name = $name;
        $this->origin = $origin;
        $this->description = $description;
        $this->id = $id;
    }
}