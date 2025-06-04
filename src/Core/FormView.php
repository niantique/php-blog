<?php

namespace App\Core;

use App\View\Part\HeaderAddView;
use App\View\Part\FooterAddView;

class FormView extends BaseView {
    protected function content(): void {
        throw new \Exception("Content not defined in the current view");
    }

    public function render(): void {
        $header = new HeaderAddView;
        $footer = new FooterAddView;

        $header->render();
        $this->content();
        $footer->render();
    }
}