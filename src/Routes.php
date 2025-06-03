<?php

namespace App;

use App\Controller\SearchController;

class Routes {
    public static function defineRoutes() {
        return [
            "/search" => new SearchController()
        ];
    }
}