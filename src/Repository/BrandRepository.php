<?php

namespace App\Repository;

use App\Entity\Brand;

class BrandRepository {
    public function persist(Brand $brand): void {
        $connection = Database::connect();
        $preparedQuery = $connection->prepare("INSERT INTO brand (name, origin, description) VALUES (:name, :origin, :description)");
        $preparedQuery->execute([
            ':name'=> $brand->getName(),
            ':origin' => $brand->getOrigin(),
            ':description' => $brand->getDescription()
        ]);

        $lastInsertId = $connection->lastInsertId();
        $brand->setId((int)$lastInsertId);
    }
}