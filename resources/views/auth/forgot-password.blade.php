<x-guest-layout>
    <div class="mb-6 text-center">
        <nav class="navbar navbar-expand-lg px-4 justify-content-center">
            <div class="container d-flex justify-content-center align-items-center">
                <!-- Logo Text -->
                <a class="navbar-brand fw-bold fs-3 text-primary" href="#" style="letter-spacing: 1px;">
                    <span style="color: #0d6efd;font-size: 30px !important;font-weight:bold;">Biz</span><span style="color: #000;font-size: 30px !important;font-weight:bold;">Reports</span>
                </a>
            </div>
        </nav>
    </div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
