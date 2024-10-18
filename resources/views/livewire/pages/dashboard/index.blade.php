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
        $this->dispatch('alert', ['type' => 'success', 'text' => __('Password updated.')]);

        // Обработка данных
    }
};
//https://www.daterangepicker.com/#config
?>

<div>
    {{$item}}
    <div wire:ignore>
    <input type="text" class="form-control" name="dates" wire:model="item"  id="dates-h" >
    </div>
    <x-btn wire:sconfirm="!!!" wire:click="test">Тест</x-btn>
</div>

@assets
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/daterange.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endassets

@script
<script>
    $('input[name="dates"]').daterangepicker().on('apply.daterangepicker', function(ev, picker) {
        var element = document.getElementById('dates-h');
        element.value = picker.element.val() ;
        element.dispatchEvent(new Event('input'));
    });
</script>
@endscript

