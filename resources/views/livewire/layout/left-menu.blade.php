<?php

use Livewire\Volt\Component;

new class extends Component {
    public $menu = [];
    public $current = '';

    public function mount() {
        $this->current = \Illuminate\Support\Facades\Route::current()->uri;
        foreach ($this->menu as &$item) {
            $item['opened'] = $this->checkItem($item, $this->current);
        }
    }

    public function checkItem(&$item, $current) {
        $isActive = false;
        if (($item['url'] ?? '-1') == $current) {
            $item['active'] = true;
            $isActive = true;
        } else {
            $item['active'] = false;
        }

        if ($item['items'] ?? false) {
            $item['opened'] = false;
            foreach ($item['items'] as &$item2) {
                if ($this->checkItem($item2, $current)) {
                    $item['opened'] = true;
                    $isActive = true;
                }
            }
        }
        return $isActive;
    }
}
?>

<nav class="mt-2">
    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        @foreach($menu as $key => $item)
            <x-menu-li :item="$item"/>
        @endforeach
    </ul>
</nav>