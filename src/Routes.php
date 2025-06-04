<?php

namespace App;

use App\Controller\SearchController;
use App\Controller\ListArticleController;
use App\Controller\ShowArticleController;

class Routes {
    public static function defineRoutes() {
        return [
            "/" => new ListArticleController(),
            "/search" => new SearchController(),
            "/article/show" => new ShowArticleController()
        ];
    }
}