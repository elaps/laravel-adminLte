<?php

namespace App\Models\AdminModels;

class BaseAdminModel {
    public $tableClass = null;
    public $query = null;

    public $columns = [];
    public $filters = [];

    public function __construct($options = []) {
        $this->filters = $this->normalizeColumnsArray($this->filters(),[ 'type']);
        $this->columns = $this->normalizeColumnsArray($this->columns(),['label', 'format', 'align']);

    }

    public function parseColumns() {

    }

    public function parseFields() {

    }

    public function search($params) {


    }

    public function normalizeColumnsArray($data, $fields = []) {
        $normalized = [];
        foreach ($data as $key => $value) {
            $columnContent = ($data[$key]);
            if (!is_array($columnContent)) {
                $parts = explode(':', $columnContent);
                $attribute = $parts[0];
                $columnContent = [];

                $i = 1;
                foreach ($fields as $key) {
                    $columnContent[$key] = $parts[$i] ?? false;
                    $i++;
                }
            } else {
                $attribute = $columnContent['attribute'] ?? $key;
            }

            $label = $columnContent['label']??false;
            if (!$label) {
                $label = $this->labels()[$attribute] ?? $attribute;
            }

            $normalized[$attribute] = array_merge($columnContent,['attribute' => $attribute, 'label' => $label]);
        }

        return $normalized;
    }

    public function getColumnTh($attribute) {
        $column = $this->columns[$attribute];
        $sort = false;
        $maySort = in_array($column['attribute'], array_values($this->sorts()));
        if ($maySort) {
            $sort = 0;
            if ($column['attribute'] == request()->query('sorted_at')) {
                $sort = 1;
            }
            if ('-' . $column['attribute'] == request()->query('sorted_at')) {
                $sort = -1;
            }
        }
        $column['sort'] =  $sort;
        return $column;
    }

    public function getColumnFilterTh($attribute) {
        $filter = false;
        $value = '';
        if (in_array($attribute, array_keys($this->filters))) {
            $filter = $this->filters()[$attribute]['type'] ?? 'like';
            $value = request()->query($attribute);
        }
        return compact('attribute', 'filter', 'value',);
    }
}
