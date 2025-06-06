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
    private int $likes = 0;

    public function __construct(
        string $author,
        string $text,
        Car $car,
        ?string $image = null,
        ?\DateTime $date = null,
        ?int $id = null,
        int $likes = 0
    ) {
        $this->author = $author;
        $this->text = $text;
        $this->car = $car;
        $this->image = $image;
        $this->date = $date ?? new \DateTime();
        $this->id = $id;
        $this->likes = $likes;
    }
    
    public function getCar(): Car {
        return $this->car;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function getDate(): \DateTime {
        return $this->date;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setAuthor(string $author): self {
        $this->author = $author;
        return $this;
    }

    public function setText(string $text): self {
        $this->text = $text;
        return $this;
    }

    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }
    public function getLikes(): int {
        return $this->likes;
    }

    public function setLikes(int $likes): void {
        $this->likes = $likes;
    }
}