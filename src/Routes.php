<?php

namespace App;

use App\Controller\SearchController;
use App\Controller\ArticleController;
use App\Controller\ListArticleController;

class Routes {
    public static function defineRoutes() {
        return [
            "/" => new ListArticleController(),
            "/search" => new SearchController(),
        ];
    }
}