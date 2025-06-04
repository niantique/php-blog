<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\BaseView;
use App\Repository\ArticleRepository;
use App\View\ArticleDetailView;
use App\View\ErrorView;

class ShowArticleController extends BaseController {
    protected function doGet(): BaseView {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            return new ErrorView("Missing article ID");
        }

        $repo = new ArticleRepository();
        $article = $repo->getById((int)$id);

        if (!$article) {
            return new ErrorView("Article not found");
        }
        return new ArticleDetailView($article);
    }
}
