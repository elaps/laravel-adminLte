<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('layouts.admin-lte')]
#[Title('Главная 3')]
class extends PageComponent {
    public $breadcrumbs = [
        ['label'=>'Home','route'=>'welcome'],
        ['label'=>'Dashboard','route'=>'dashboard'],
        ['label'=>'Dashboard v3'],
    ];
}; ?>

<div>
    Привет третий!!
    <a href="{{ route('dashboard') }}" wire:navigate> Назад</a>
</div>
