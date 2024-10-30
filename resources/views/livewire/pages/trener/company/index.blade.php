<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.admin-lte')]
#[Title('Главная')]
class extends PageComponent {
    public $filterForm = [];

    public $breadcrumbs = [
        ['label' => 'Home', 'route' => 'welcome'],
        ['label' => 'Dashboard', 'route' => 'dashboard'],
    ];

    public function mount() {
        $this->filterForm['id'] = request()->get('id');
        $this->filterForm['user_id'] = null;
    }

    public function with() {
        return ['model'=> new \App\Models\AdminModels\CompanyAdminModel()];
    }

    public function filter() {
        $this->dispatch('reloaded');

    }
};

?>
<div >
    @dump($filterForm)
    @php
    echo \App\Http\TableView::widget([
        'model' => $model,
    ]);
    @endphp
</div>