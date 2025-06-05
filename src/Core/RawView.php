<?php

namespace App\Core;

use App\View\Part\HeaderDetailView;
use App\View\Part\Footer;

class RawView extends BaseView {
     protected function content() {
        throw new \Exception("Content not defined in the current view");
    }

    public function render() {
        $header = new HeaderDetailView();
        $footer = new Footer();

        $header->render();
        $this->content();
        $footer->render();
    }
}