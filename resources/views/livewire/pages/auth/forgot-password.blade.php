<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
};
?>
@section('title')
    {{ __('Восстановление пароля') }}
@endsection
<div>
    <div class="mb-4">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <!--x-auth-session-status class="mb-4" :status="session('status')" /-->
    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <x-form-field :label="__('Email')"
                      model="email"
                      placeholder="Email"
                      icon="bi bi-envelope"
                      type="email"/>

        <div class="d-flex justify-content-end mt-4" >
            <x-btn type="primary">
                {{ __('Email Password Reset Link') }}
            </x-btn>
        </div>

    </form>

</div>
