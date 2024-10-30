<?php

namespace App\Http;

use Illuminate\View\View;

class TableView {

    public static function widget($options) {
        $html = view('components.table-view.table',
            [
                'model' => $options['model']
            ])->render();;
        return $html;
    }
}