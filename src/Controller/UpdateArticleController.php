<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Repository\ArticleRepository;
use App\View\ErrorView;
use App\View\FormArticleView;
use App\View\RedirectView;

class UpdateArticleController extends BaseController {
    public function doGet(): \App\Core\BaseView {
        $id = $_GET["id"] ?? null;
        if (!$id || !is_numeric($id)) {
                return new ErrorView("Invalid ID");
            }
            $repo = new ArticleRepository();
            $article = $repo->getById((int)$id);

            if (!$article) {
                return new ErrorView("This article does not existe");
            }
        return new FormArticleView($article);
    }

    public function doPost(): \App\Core\BaseView {
        $id = $_GET["id"] ?? null;
        if (!$id || !is_numeric($id)) {
            return new ErrorView("Invalid article ID");
        }
        $repo = new ArticleRepository();
        $article = $repo->getById((int)$id);
        if (!$article) {
            return new ErrorView("Article not found");
        }

        if(empty($_POST['author']) ||
            empty($_POST['text']) ||
            empty($_POST['image']) ||
            empty($_POST['car_model']) ||
            empty($_POST['car_year']) ||
            empty($_POST['car_brand_name']) ||
            empty($_POST['car_brand_origin']) ||
            empty($_POST['car_brand_description'])
            ) {
            return new FormArticleView($article, "All fields are required");
        }

        $article->setAuthor($_POST["author"]);
        $article->setText($_POST["text"]);
        $article->setImage($_POST["image"]);

        $repo->update($article);
        return new RedirectView("/article/show?id=".$article->getId());
    }
}