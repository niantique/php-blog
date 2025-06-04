<?php

namespace App;

use App\Controller\SearchController;
use App\Controller\ListArticleController;
use App\Controller\ShowArticleController;
use App\Controller\AddArticleController;
use App\Controller\UpdateArticleController;

class Routes {
    public static function defineRoutes() {
        return [
            "/" => new ListArticleController(),
            "/search" => new SearchController(),
            "/article/show" => new ShowArticleController(),
            "/add-article" => new AddArticleController(),
            "/update-article" => new UpdateArticleController()
        ];
    }
}