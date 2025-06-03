<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Car;
use App\Entity\Brand;

class ArticleRepository {
    public function getAll(): array {
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("
            SELECT 
                a.id AS article_id, a.author, a.text, a.image AS article_image, a.date,
                c.id AS car_id, c.model, c.year, c.image AS car_image, c.brand_id,
                b.id AS brand_id, b.name AS brand_name, b.origin, b.description
            FROM article a
            JOIN car c ON a.car_id = c.id
            JOIN brand b ON c.brand_id = b.id
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
}