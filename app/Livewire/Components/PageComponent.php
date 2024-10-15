<?php

namespace App\Livewire\Components;
use Livewire\Volt\Component;
class PageComponent extends Component{

    public function rendering(\Illuminate\View\View $view): void {
        if(isset($this->breadcrumbs)) {
            $view->layoutData(['breadcrumbs' => $this->breadcrumbs]);
        }
        if(isset($this->title)) {
            $view->title( $this->title);
        }
    }

}