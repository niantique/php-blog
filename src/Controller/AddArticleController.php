<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Entity\Article;
use App\Entity\Brand;
use App\Entity\Car;
use App\Repository\ArticleRepository;
use App\View\FormArticleView;
use App\View\RedirectView;

class AddArticleController extends BaseController {
    protected function doGet(): \App\Core\BaseView {
        return new FormArticleView();
    }
    protected function doPost(): \App\Core\BaseView {
        if(!empty($_POST['author']) && 
            !empty($_POST['text']) && 
            !empty($_POST['car_model']) &&
            !empty($_POST['car_year']) &&
            !empty($_POST['car_brand_name']) &&
            !empty($_POST['car_brand_origin']) &&
            !empty($_POST['car_brand_description'])
            ) {
            
            $brand = new Brand(
                $_POST['car_brand_name'],
                $_POST['car_brand_origin'],
                $_POST['car_brand_description']);
            $car = new Car($_POST['car_model'], (int) $_POST['car_year'], '', $brand);
            $article = new Article($_POST['author'], $_POST['text'], $car, null);
            
            $repo = new ArticleRepository;
            $repo->persist($article);

            return new RedirectView("/article?id=".$article->getId());
        }

        return new FormArticleView();
        }
    }
