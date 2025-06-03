<?php

namespace App\Repository;

use App\Entity\Car;
use App\Entity\Brand;

class CarRepository
{
    public function findAll(): array
    {
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT * FROM car");
        $preparedQuery->execute();

        while ($line = $preparedQuery->fetch()) {
            $car = new Car(
                $line["model"],
                $line["year"],
                $line["image"],
                $line["brand"],
                $line["id"]
            );
            $list[] = $car;
        }
        return $list;
    }

    public function search(string $keyword): array
    {
        $list = [];
        $connection = Database::connect();
        $preparedQuery = $connection->prepare("
        SELECT car.*,
        brand.id AS brand_id,
        brand.name AS brand_name,
        brand.origin AS brand_origin,
        brand.description AS brand_description
        FROM car
        JOIN brand on car.brand_id = brand.id
        WHERE car.model LIKE :modelKeyword
        OR brand.name LIKE :brandKeyword");
        $preparedQuery->execute([
            ':modelKeyword' => '%' . $keyword . '%',
            ':brandKeyword' => '%' . $keyword . '%'
        ]);

        while ($line = $preparedQuery->fetch()) {
            $brand = new Brand(
                $line["brand_name"],
                $line["brand_origin"],
                $line["brand_description"],
                $line["brand_id"]
            );

            $car = new Car(
                $line["model"],
                $line["year"],
                $line["image"],
                $brand,
                $line["id"]
            );
            $list[] = $car;
        }
        return $list;
    }
}
