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

    public $item=1;
    public $item2=2;

    public $data = [
        1=>'Item 1',
        2=>'Item 2',
        3=>'Item 3',
        4=>'Item 4'
    ];


    public function test() {

    }
}; ?>

<div x-data="{}" >
    {{$item}}
    <p>
    <a href="{{ route('dashboard') }}" wire:navigate> Назад</a>
    </p>
    <x-form-field model="item" :data="$data" type="select2" label="Проверка" icon="calendar" ></x-form-field>
    <x-form-field model="item2" :data="$data" type="select2" label="Проверка" icon="calendar"></x-form-field>
    <x-btn wire:click="test">Тест</x-btn>
</div>

