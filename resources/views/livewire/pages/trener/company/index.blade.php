<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.admin-lte')]
#[Title('Главная')]
class extends PageComponent {

    public $breadcrumbs = [
        ['label' => 'Home', 'route' => 'welcome'],
        ['label' => 'Dashboard', 'route' => 'dashboard'],
    ];

    public function with() {
        return ['items'=> \App\Models\Company::where('user_id', auth()->user()->id)];
    }
};

?>
<div>
    @php
    echo \App\Http\TableView::widget([
        'columns'=>[
            'id',
            'name:Название',
            'alias:Поддомен',
        ],
        'rows' =>  $items->paginate(10),
        ]);
    @endphp
</div>