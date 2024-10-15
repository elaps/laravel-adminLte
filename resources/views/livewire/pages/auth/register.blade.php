<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>
@section('title')
    {{ __('Регистрация') }}
@endsection
<div>
    <form wire:submit="register">
        <x-form-field :label="__('Name')"
                      model="name"
                      icon="bi bi-person"
                      type="text"/>

        <x-form-field :label="__('Email')"
                      model="email"
                      placeholder="Email"
                      icon="bi bi-envelope"
                      type="email"/>

        <x-form-field :label="__('Password')"
                      model="password"
                      icon="bi bi-lock"
                      type="password"/>

        <x-form-field :label="__('Password again')"
                      model="password_confirmation"
                      icon="bi bi-lock"
                      type="password"/>

        <div class="row">
            <div class="col-8 d-inline-flex align-items-center">
                <div class="form-check">
                    <a class="" href="{{ route('login') }}" wire:navigate>
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <x-btn type="primary">
                        {{ __('Register') }}
                    </x-btn>
                </div>
            </div>
        </div>


    </form>
</div>
