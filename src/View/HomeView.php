<?php

namespace App\View;

use App\Core\BaseView;

class HomeView extends BaseView
{
    private array $articles;
    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }
    protected function content(): void
    {
        echo '<div class="carList">';
        foreach ($this->articles as $article) {
            $car = $article->getCar();
            echo '<div class="carItem">';
            echo '<img src="' . htmlspecialchars($car->getImage()) . '" alt="Image of ' . htmlspecialchars($car->getModel()) . '" class="car-image">';
            echo '<h3 class="carTitle">' . htmlspecialchars($car->getBrand()->getName()) . ' - ' . htmlspecialchars($car->getModel()) . '</h3>';
            echo '</div>';
        }
        echo '</div>';
    }
}
