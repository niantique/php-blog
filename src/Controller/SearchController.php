<?php

namespace App\Controller;

use App\Core\BaseController;
use App\View\ErrorView;
use App\View\HomeView;
use App\Repository\ArticleRepository;

class SearchController extends BaseController {
    protected function doGet(): \App\Core\BaseView {
        $keyword = $_GET["keyword"] ?? null;
        if(empty($keyword)) {
            return new ErrorView("A search keyword is required");
        }

        $repo = new ArticleRepository();
        $results = $repo->searchByLabel($keyword);
        
        if (empty($results)) {
            return new ErrorView("No result");
        }
        return new HomeView($results);
    }
}