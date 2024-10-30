<?php

namespace App\Models\AdminModels;

use App\Models\Company;

class CompanyAdminModel extends BaseAdminModel {
    public $tableClass = Company::class;

    public function labels() {
        return [
            'id' => __('ID'),
            'user_id' => __('Пользователь'),
            'name' => __('Название'),
            'alias' => __('Поддомен')
        ];
    }

    public function columns() {
        return [
            'id' ,
            'user_id',
            'name:Имя' ,
            'alias',
            ['attribute' => 'created_at',
                'label' => 'Дата',
                'align' => 'center'
            ],
        ];
    }

    public function fields() {
        return [
            'id',
            'user_id' => [
                'type' => 'select2',
                'data' => [1, 2, 3]
            ],
            'name',
            'alias',
            'created_at'=>[
                'type' => 'datetime'
            ],
            'is_active'=>[
                'type' => 'checkbox'
            ]
        ];
    }

    public function rules() {
        return [
            'id',
            'name',
            'alias'
        ];
    }

    public function sorts() {
        return [
            'id',
            'user_id',
            'name',
            'created_at'
        ];
    }

    public function filters() {
        return [
            'id',
            'user_id'=>[
                'type' => 'select2',
                'data' => [1, 2, 3]
            ],
            'name' => 'like',
            'alias',
            'created_at' => 'date'
        ];
    }

}