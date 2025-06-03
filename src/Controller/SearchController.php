<?php

namespace App\Controller;

use App\Core\BaseController;
use APP\Repository\CarRepository;
use App\View\ErrorView;
use App\View\HomeView;

class SearchController extends BaseController {
    protected function doGet(): \App\Core\BaseView {
        $keyword = $_GET["keyword"];
        if(empty($keyword)) {
            return new ErrorView("A search keyword is required");
        }

        $repo = new CarRepository();
        return new HomeView($repo->search($keyword));
    }
}