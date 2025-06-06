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
            echo "<li class='articleLine'>";
            echo "<span class='label'><a href='/article/show?id={$article->getId()}'>$label</a></span>";
            echo "<span class='actions'>";
            echo "<a href='/update?id={$article->getId()}'>UPDATE</a>";
            echo "<a href='/delete?id={$article->getId()}'>DELETE</a>";
            echo "</span>";
            echo "</li>";
        }
        echo "</ul>";
        echo '</div>';
        echo '</section>';
    }
}
