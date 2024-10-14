<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')]
#[\Livewire\Attributes\Title('LLLL')]
class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

@section('title')
    {{ __('Вход') }}
@endsection
<div>
    <!-- Session Status -->
    <form wire:submit="login">

        <x-form-field :label="__('Email')"
                      model="form.email"
                      placeholder="Email"
                      icon="bi bi-envelope"
                      type="email"/>

        <x-form-field :label="__('Password')"
                      model="form.password"
                      placeholder="Password"
                      icon="bi bi-lock"
                      type="password"/>


        <div class="row">
            <div class="col-8 d-inline-flex align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="form.remember" id="remember"
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{__('Запомнить меня')}}
                    </label></div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <x-primary-button>{{ __('Log in') }}</x-primary-button>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">

            @if (Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                </p>
            @endif

            <p class="mb-0"><a href="{{ route('register') }}" class="text-center" wire:navigate>
                    Register a new membership
                </a></p>
        </div>
    </form>
</div>




