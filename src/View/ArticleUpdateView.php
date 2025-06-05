<?php

namespace App\View;

use App\Core\UpdateView;

class ArticleUpdateView extends UpdateView
{
    private array $articles;

    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }

    protected function content(): void
    {
        echo '<section class="update">';
        echo "<h1>Blaze Leon</h1>";
        echo '<div>';
        echo '<h2>My published reviews</h2>';
        echo '<ul>';
        foreach (($this->articles) as $article) {
            $car = $article->getCar();
            $brand = $car->getBrand();
            $label = htmlspecialchars($brand->getName() . " " . $car->getModel());

            echo "<li>";
            echo "<a href='/update?id={$article->getId()}'>$label<p>UPDATE</p></a>";
            echo "</li>";
        }
        echo "</ul>";
        echo '</div>';
        echo '</section>';
    }
}
