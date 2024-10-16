<?php

use App\Livewire\Components\PageComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.admin-lte')]
#[Title('Профиль')]
class extends PageComponent {

}; ?>


<div>

    <div class="card mb-4">
        <div class="card-body">
            <livewire:profile.update-profile-information-form/>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <livewire:profile.update-password-form/>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <livewire:profile.delete-user-form/>
        </div>
    </div>

</div>

