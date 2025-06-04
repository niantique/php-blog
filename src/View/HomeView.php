<?php

namespace App\View;

use App\Core\BaseView;

class HomeView extends BaseView
{
    private array $cars;
    public function __construct(array $cars)
    {
        $this->cars = $cars;
    }
    protected function content(): void
    {
        echo '<div class="carList">';
        foreach ($this->cars as $car) {
            echo '<div class="carItem">';
            echo '<img src="' . htmlspecialchars($car->getImage()) . '" alt="Image of ' . htmlspecialchars($car->getModel()) . '" class="car-image">';
            echo '<h3 class="carTitle">' . htmlspecialchars($car->getBrand()->getName()) . ' - ' . htmlspecialchars($car->getModel()) . '</h3>';
            echo '</div>';
        }
        echo '</div>';
    }
}
