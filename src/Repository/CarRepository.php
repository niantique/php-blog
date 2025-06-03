<?php

namespace App\Repository;

use App\Entity\Car;

class CarRepository {
    public function findAll(): array {
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT $ FROM car");
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
}