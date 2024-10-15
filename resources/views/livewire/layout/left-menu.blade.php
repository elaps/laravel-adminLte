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

    <!--hr>
    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open"><a href="#" class="nav-link active">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item"><a href="./index.html" class="nav-link"> <i
                                class="nav-icon bi bi-circle"></i>
                        <p>Dashboard v1</p>
                    </a>
                </li>
                <li class="nav-item"><a href="./index2.html" class="nav-link active"> <i
                                class="nav-icon bi bi-circle"></i>
                        <p>Dashboard v2</p>
                    </a>
                </li>
                <li class="nav-item"><a href="./index3.html" class="nav-link"> <i
                                class="nav-icon bi bi-circle"></i>
                        <p>Dashboard v3</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul-->
</nav>