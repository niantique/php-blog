<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\BaseView;
use App\Repository\ArticleRepository;
use App\View\ArticleListView;
use App\View\ErrorView;

class ListArticleController extends BaseController {

    protected function doGet(): BaseView {
        $repo = new ArticleRepository();
        $articles = $repo->getAll();

        if (empty($articles)) {
            return new ErrorView("No articles found");
        }
        return new ArticleListView($articles);
    }
}