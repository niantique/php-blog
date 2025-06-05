<?php

namespace App\View;

use App\Core\RawView;
use App\Entity\Article;

class ArticleDetailView extends RawView {
    private article $article;

    public function __construct(Article $article) {
        $this->article = $article;
    }

    protected function content(): void {
        $car = $this->article->getCar();
        $brand = $car->getBrand();
        $imgPath = '/' . ltrim($car->getImage(), '/');
        echo "<section>";
        echo "<div>";
        echo"<h1>Blaze Leon</h1>";
        echo "<img src='{$imgPath}' alt='{$car->getModel()}'/>";
        echo "<h4>{$car->getYear()} Author {$this->article->getAuthor()}</h4>";
        echo "<p>{$this->article->getText()}</p>";
        echo "</div>";
        echo"<div>";
        echo "<h2>{$car->getModel()} {$brand->getName()}</h2>";
        echo "<p>{$this->article->getText()}</p>";
        echo "<img src='{$imgPath}' alt='{$car->getModel()}'/>";
        echo "</div>";
        echo "</section>";
        }
}
