@extends('front.layouts.app')
@section('title', 'Login - SageCodex')
@section('content')
    <x-nav-guest />
    <main class="flex-1 flex flex-col md:flex-row overflow-hidden">
        <div class="hidden md:block md:w-2/5 relative">
            <img src="https://picsum.photos/id/169/1000/1600" alt="Esports tournament" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black opacity-60"></div>
            <div class="absolute bottom-10 left-10 right-10 text-white">
                <h2 class="text-3xl font-bold mb-2">Welcome Back, Gamer</h2>
                <p class="text-lg text-neutral-light">Continue your journey to esports excellence.</p>
            </div>
        </div>

        <!-- Sign In Form Section (60% on desktop, 100% on mobile) -->
        <div class="w-full md:w-3/5 flex items-center justify-center p-6 md:p-12 overflow-y-auto">
            <div class="w-full max-w-md">
                <!-- Mobile Header -->
                <div class="text-center mb-8 md:hidden">
                    <h2 class="text-3xl font-bold mb-2">Welcome Back</h2>
                    <p class="text-neutral-dark dark:text-neutral-light">Sign in to continue your training</p>
                </div>

                <!-- Desktop Header -->
                <div class="hidden md:block mb-8">
                    <h2 class="text-3xl font-bold mb-2">Sign In</h2>
                    <p class="text-neutral-dark dark:text-neutral-light">Enter your credentials to access your account</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input w-full"
                            placeholder="your.email@example.com" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium">Password</label>
                            <a href="#" class="text-sm text-brand-primary hover:text-brand-primary-dark">Forgot
                                password?</a>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="form-input w-full pr-10"
                                placeholder="••••••••" required>
                            <button type="button" class="absolute inset-y-0 right-0 px-3 flex items-center"
                                id="toggle-password">
                                <i class="fas fa-eye text-neutral-dark dark:text-neutral-light"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3 px-4 rounded-lg bg-brand-primary text-white hover:bg-brand-primary-dark transition-colors font-medium">
                        Sign In
                    </button>
                </form>

                <!-- Sign Up Link -->
                <p class="text-center mt-6 text-sm">
                    Don't have an account?
                    <a href="signup.html" class="text-brand-primary hover:text-brand-primary-dark font-semibold">Sign up
                        now</a>
                </p>
            </div>
        </div>
    </main>
@endsection
@push('after-scripts')
    <script src="{{ asset('js/darkMode.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle button functionality
            const toggleButton = document.querySelector('[data-theme-toggle]');
            const moonIcon = document.querySelector('[data-icon="moon"]');
            const sunIcon = document.querySelector('[data-icon="sun"]');

            if (toggleButton && moonIcon && sunIcon) {
                toggleButton.addEventListener('click', function() {
                    document.body.classList.toggle('dark');
                    moonIcon.classList.toggle('hidden');
                    sunIcon.classList.toggle('hidden');

                    // Save preference to localStorage
                    if (document.body.classList.contains('dark')) {
                        localStorage.setItem('theme', 'dark');
                    } else {
                        localStorage.setItem('theme', 'light');
                    }
                });

                // Check for saved theme preference
                const savedTheme = localStorage.getItem('theme');
                if (savedTheme === 'dark') {
                    document.body.classList.add('dark');
                    moonIcon.classList.add('hidden');
                    sunIcon.classList.remove('hidden');
                }
            }

            // Toggle password visibility
            const togglePassword = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle icon
                    const icon = togglePassword.querySelector('i');
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                });
            }
        });
    </script>
@endpush
