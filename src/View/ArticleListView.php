<?php

namespace App\View;

use App\Core\BaseView;
use App\Entity\Article;

class ArticleListView extends BaseView {
    private array $articles;

    public function __construct(array $articles) {
        $this->articles = $articles;
    }

    protected function content(): void {
        echo "<h1>OUR CAR ARTICLES</h1>";
        foreach ($this->articles as $article) {
            $car = $article->getCar();
            $brand = $car->getBrand();
            echo "<div>";
            echo "<h2>{$car->getModel()} ({$car->getYear()}) - {$brand->getName()}</h2>";
            echo "<p>Author: {$article->getAuthor()}</p>";
            echo "<p>{$article->getText()}</p>";
            echo "<img src='{$car->getImage()}' alt='{$car->getModel()}'>";
            echo "</div>"; 
        }
    }
}