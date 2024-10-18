<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.admin-lte')]
#[Title('Главная')]
class extends PageComponent {
    public $item = 2;
    public $data = [
        1=>'item 1',
        2=>'item 2',
        3=>'item 3',
    ];
    public function test() {
        // Обработка данных
    }
};
//https://www.daterangepicker.com/#config
?>

<div>
    {{$item}}
    <input type="text" name="dates" wire:model="item" >
    <x-btn wire:click="test">Тест</x-btn>
</div>

@script
<script>
    console.log('111')
</script>
@endscript
