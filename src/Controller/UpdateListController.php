<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Repository\ArticleRepository;
use App\View\ArticleUpdateView;

class UpdateListController extends BaseController {
    protected function doGet(): \App\Core\BaseView {
        $repo = new ArticleRepository();
        $articles = $repo->getAll();
        return new ArticleUpdateView($articles);
    }
}