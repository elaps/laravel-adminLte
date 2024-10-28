<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.admin-lte')]
#[Title('Главная')]
class extends PageComponent {
    public $item = 1;
    public $item2 = 2;
    public $data = [
        1=>'item 1',
        2=>'item 2',
        3=>'item 3',
    ];
    public function test() {
        $this->dispatch('alert', ['type' => 'success', 'text' => __('Password updated.')]);

        // Обработка данных
    }
};
//https://www.daterangepicker.com/#config
?>

<div>
    <x-form-field model="item" type="date" label="Проверка" ></x-form-field>
    <x-form-field model="item2" type="daterange" label="Проверка" icon="calendar"></x-form-field>
    <x-editorjs>111</x-editorjs>
    <x-btn wire:sconfirm="!!!" wire:click="test">Тест</x-btn>
</div>

