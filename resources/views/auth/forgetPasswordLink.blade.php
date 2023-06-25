<!-- resources/views/auth/passwords/reset.blade.php -->
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!-- Coloca aquí tu logo -->
        </x-slot>

        <!-- Título -->
        <x-slot name="title">
            Reset Password
        </x-slot>

        <!-- Contenido del formulario -->
        <div>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Campo de correo electrónico -->
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Campo de contraseña -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Campo de confirmación de contraseña -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
