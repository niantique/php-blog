<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\BaseView;
use App\Repository\ArticleRepository;
use App\View\ArticleDetailView;
use App\View\ErrorView;

class ShowArticleController extends BaseController {
    private ArticleRepository $articleRepository;

    public function __construct() {
        $this->articleRepository = new ArticleRepository();
    }
    protected function doGet(): BaseView {
        $path = $_SERVER['PATH_INFO'] ?? '';
        $id = $_GET['id'] ?? null;

        if ($path === '/like') {
            return new ErrorView("method not allowed");
        }

        if (!$id || !is_numeric($id)) {
            return new ErrorView("missing article ID");
        }
        $article = $this->articleRepository->getById((int)$id);

        if (!$article) {
            return new ErrorView("Article not found");
        }
        return new ArticleDetailView($article);
    }

    protected function doPost(): BaseView {
        $path = $_SERVER['PATH_INFO'] ?? '';

        if ($path === '/like') {
            $id = $_GET['id'] ?? null;
            if ($id !== null && is_numeric($id)) {
                $this->articleRepository->incrementLike((int)$id);
                header("Location: /article/show?id={$id}");
                exit();
            } else {
                return new ErrorView("Missing or invalid article ID");
            }
        }
        return new ErrorView("Route not supported for post");
    }
}
