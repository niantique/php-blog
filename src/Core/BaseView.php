<?php

namespace App\Core;

use App\View\Part\Header;
use App\View\Part\Footer;

class BaseView {
    protected function content() {
        throw new \Exception("Content not defined in the current view");
    }

    public function render() {
        $header = new Header();
        $footer = new Footer();

        $header->render();
        $this->content();
        $footer->render();
    }
}