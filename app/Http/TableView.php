<?php

namespace App\Http;

use Illuminate\View\View;

class TableView {

    public static function widget($options) {
        $html = view('components.table-view.table',
            [
                'columns' => $options['columns']??[],
                'rows' => $options['rows']??[],
                'search-model'
            ])->render();;
        return $html;
    }
}