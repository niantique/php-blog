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
        $likes = $this->article->getLikes();
        echo "<section>";
        echo "<div>";
        echo"<h1><a href='/'>Blaze Leon</a></h1>";
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
        echo '<div class="like">';
        echo "<span class='likeCount'>{$likes}</span>";
        echo "<form method='post' action='/like?id={$this->article->getId()}' class='likeForm'>";
        echo "<button type='submit' class='likeButton'>&#10084;</button>";
        echo "</form>";
        echo "</div>";
        }
}
