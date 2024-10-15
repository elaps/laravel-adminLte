<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


new
#[Layout('layouts.admin-lte')]
class extends PageComponent {

    public $title = 'Главная 2';
    public $breadcrumbs = [
        ['label'=>'Home','route'=>'welcome'],
        ['label'=>'Dashboard v2'],
    ];

}; ?>

<div>
    Привет втрой!!
    <a href="{{ route('dashboard') }}" wire:navigate> Назад</a>
</div>
