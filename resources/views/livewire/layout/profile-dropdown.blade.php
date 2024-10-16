<?php
new class extends \Livewire\Volt\Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(\App\Livewire\Actions\Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
};
?>

<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <span class="d-md-inline">
            <span x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></span>
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

        <li>
            <a href="{{ route('profile') }}" wire:navigate class="btn btn-default btn-flat">Profile</a>
            <a href="#" wire:click="logout" class="btn btn-default btn-flat float-end">{{ __('Logout') }}</a>
        </li>

    </ul>
</li>