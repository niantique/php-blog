<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Car;
use App\Entity\Brand;

class ArticleRepository
{
    public function getAll(): array
    {
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("
            SELECT 
    article.id AS article_id,
    article.author,
    article.text,
    article.image AS article_image,
    article.date,

    car.id AS car_id,
    car.model,
    car.year,
    car.image AS car_image,
    car.brand_id,

    brand.id AS brand_id,
    brand.name AS brand_name,
    brand.origin,
    brand.description

FROM article
JOIN car ON article.car_id = car.id
JOIN brand ON car.brand_id = brand.id;
        ");
        $preparedQuery->execute();

        while ($line = $preparedQuery->fetch()) {
            $brand = new Brand(
                $line['brand_name'],
                $line['origin'],
                $line['description'],
                $line['brand_id']
            );

            $car = new Car(
                $line['model'],
                $line['year'],
                $line['car_image'],
                $brand,
                $line['car_id']
            );

            $article = new Article(
                $line['author'],
                $line['text'],
                $car,
                $line['article_image'],
                new \DateTime($line['date']),
                $line['article_id']
            );
            $list[] = $article;
        }
        return $list;
    }

    public function getById(int $id): ?Article
    {
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("
          SELECT 
    article.id AS article_id,
    article.author,
    article.text,
    article.image AS article_image,
    article.date,

    car.id AS car_id,
    car.model,
    car.year,
    car.image AS car_image,
    car.brand_id,

    brand.id AS brand_id,
    brand.name AS brand_name,
    brand.origin,
    brand.description

FROM article
JOIN car ON article.car_id = car.id
JOIN brand ON car.brand_id = brand.id
WHERE article.id = :id;");
        $preparedQuery->execute(['id' => $id]);
        $line = $preparedQuery->fetch();
        if (!$line) return null;

        $brand = new Brand($line['brand_name'], $line['origin'], $line['description'], $line['brand_id']);
        $car = new Car($line['model'], $line['year'], $line['car_image'], $brand, $line['car_id']);
        return new Article($line['author'], $line['text'], $car, $line['article_image'], new \DateTime($line['date']), $line['article_id']);
    }

    public function persist(Article $article): void {
        $connection = Database::connect();
        $preparedQuery = $connection->prepare("INSERT INTO article (author, text, car_id, image, date) VALUES (:author, :text, :car_id, :image, :date)");
        $preparedQuery->execute([
            ':author' => $article->getAuthor(),
        ':text' => $article->getText(),
        ':car_id' => $article->getCar()->getId(),
        ':image' => $article->getImage(),
        ':date' => $article->getDate()->format('Y-m-d H:i:s')
        ]);
        $lastInsertId = $connection->lastInsertId();
        $article->setId((int)$lastInsertId);
    }

    public function update(Article $article): void {
        $connection = Database::connect();
        $preparedQuery = $connection->prepare("
          UPDATE article 
        SET author = :author, text = :text, image = :image 
        WHERE id = :id
        ");
        $preparedQuery->execute([
             ':author' => $article->getAuthor(),
        ':text' => $article->getText(),
        ':image' => $article->getImage(),
        ':id' => $article->getId()
        ]);

    }
}
