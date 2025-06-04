<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\View\ErrorView;
use App\View\FormArticleView;
use App\View\RedirectView;

class UpdateArticleController extends BaseController {
    public function doGet(): \App\Core\BaseView {
        $id = $_GET["id"] ?? null;
        if (!empty($id) && is_numeric($id)) {
            $repo = new ArticleRepository();
            $article = $repo->findById($id);
            if ($article) {
                return new FormArticleView(article: $article);
            }
        }
        return new ErrorView("This article does not exist");
    }

    public function doPost(): \App\Core\BaseView {
        $id = $_GET["id"] ?? null;
        $repo = new ArticleRepository();

        if (!id || !is_numeric($id)) {
            return new ErrorView("Invalid article ID");
        }
        $article = $repo->findById((int)$id);
        if (!article) {
            return new ErrorView("Article not found");
        }

        if(empty($_POST['author']) || empty($_POST['text']) || empty($_POST['image']) || empty($_POST['car'])) {
            return new FormArticleView(error: "All fields are required", article: $article);
        }

        $article->setAuthor($_POST["author"]);
        $article->settext($_POST["text"]);
        $article->setImage($_POST["image"]);

        $repo->update($article);
        return new RedirectView("/article/show?id=".$article->getId());
    }
}