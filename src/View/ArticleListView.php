<?php

namespace App\View;

use App\Core\BaseView;

class ArticleListView extends BaseView
{
    private array $articles;

    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }

    protected function content(): void
    {   
        echo "<h4>OUR CAR ARTICLES</h4>";
        echo '<div class="articlesMain">';
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
        echo '<div class="manage">';
        echo"<a href='/add-article'>Write a review</a>";
        echo "<a href='/update-list'>Manage your review</a>";
        echo "</div>";
    }
}
