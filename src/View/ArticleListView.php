<?php

namespace App\View;

use App\Core\BaseView;
use App\Entity\Article;

class ArticleListView extends BaseView
{
    private array $articles;

    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }

    protected function content(): void
    {
        echo '<div class="articlesMain">';
        // echo "<h1>OUR CAR ARTICLES</h1>";
        foreach (array_slice($this->articles, 0, 3) as $article) {
            $car = $article->getCar();
            $brand = $car->getBrand();
            echo "<div>";
            echo "<a href='/article/show?id={$article->getId()}'>";
            echo "<img src='{$car->getImage()}' alt='{$car->getModel()}'>";
            echo "</a>";
            echo "<h2>{$car->getModel()} ({$car->getYear()}) {$brand->getName()}</h2>";
            echo "<p>Author: {$article->getAuthor()}</p>";
            echo "</div>";
        }
        echo "</div>";
    }
}
