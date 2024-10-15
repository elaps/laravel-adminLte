<?php

use Livewire\Volt\Component;

new class extends Component {
    public int $count = 0;
    public function increment(): void {
        $this->count++;
    }
}; ?>

<div>
    <button wire:click="increment">Increment</button>
    <p>{{ $count }}</p>
</div>
