<?php

namespace App\View;

use App\Core\BaseView;

class HomeView extends BaseView {
    private array $cars;
    public function __construct(array $cars) {
        $this->cars = $cars;
    }
    protected function content(): void {
        foreach($this->cars as $car) {
            echo "<p><a href='/car?id=".$car->getId()."'>".$car->getName()."</a></p>";
        }
    }
}