<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Entity\Article;
use App\Entity\Brand;
use App\Entity\Car;
use App\Repository\ArticleRepository;
use App\Repository\BrandRepository;
use App\Repository\CarRepository;
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
            $brandRepo = new BrandRepository();
            $brandRepo ->persist($brand);

            $car = new Car($_POST['car_model'], (int) $_POST['car_year'], '', $brand);
            
            $carRepo = new CarRepository();
            $carRepo->persist($car);

            $article = new Article($_POST['author'], $_POST['text'], $car, null);
            
            $articleRepo = new ArticleRepository();
            $articleRepo->persist($article);

            return new RedirectView("/article/show?id=".$article->getId());
        }

        return new FormArticleView();
        }
    }
