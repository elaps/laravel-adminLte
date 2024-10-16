<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.admin-lte')]
#[Title('Главная')]
class extends PageComponent {
    public $title = 'Главная1';
};
?>

<div>
 Привет!!
 <a href="{{ route('dashboard2') }}" wire:navigate> вперед</a>
 <livewire:counter/>
</div>
