<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">

        <x-form-field :label="__('Current Password')"
                      model="current_password"
                      :placeholder="__('Current Password')"
                      icon="bi bi-envelope"
                      type="password"/>
        <x-form-field :label="__('New Password')"
                      model="password"
                      :placeholder="__('Current Password')"
                      icon="bi bi-envelope"
                      type="password"/>
        <x-form-field :label="__('Confirm Password')"
                      model="password_confirmation"
                      :placeholder="__('Current Password')"
                      icon="bi bi-envelope"
                      type="password"/>


        <div class="flex items-center gap-4">
            <x-btn type="primary">{{ __('Save') }}</x-btn>

            <div class="me-3" on="password-updated">
                {{ __('Saved.') }}
            </div>

        </div>
    </form>
</section>
