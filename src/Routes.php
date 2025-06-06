<?php

namespace App;

use App\Controller\SearchController;
use App\Controller\ListArticleController;
use App\Controller\ShowArticleController;
use App\Controller\AddArticleController;
use App\Controller\DeleteController;
use App\Controller\UpdateArticleController;
use App\Controller\UpdateListController;

class Routes {
    public static function defineRoutes() {
        return [
            "/" => new ListArticleController(),
            "/search" => new SearchController(),
            "/article/show" => new ShowArticleController(),
            "/like" => new ShowArticleController(),
            "/add-article" => new AddArticleController(),
            "/update" => new UpdateArticleController(),
            "/update-list" => new UpdateListController(),
            "/delete" => new DeleteController(),
        ];
    }
}