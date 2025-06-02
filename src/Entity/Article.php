<?php

namespace App\Entity;
use App\Entity\Car;
use DateTime;

class Article {
    private ?int $id;
    private string $author;
    private \DateTime $date;
    private string $text;
    private ?string $image;
    private Car $car;

    public function __construct(
        string $author,
        string $text,
        Car $car,
        ?string $image = null,
        ?\DateTime $date = null,
        ?int $id = null
    ) {
        $this->author = $author;
        $this->text = $text;
        $this->car = $car;
        $this->image = $image;
        $this->date = $date ?? new \DateTime();
        $this->id = $id;
    }
}

