@extends('front.layouts.app')
@section('title', 'Register - SageCodex')
@section('content')
    <x-nav-guest />
    <main class="flex-1 flex flex-col md:flex-row overflow-hidden">
        <!-- Hero Image Section (40% on desktop) -->
        <div class="hidden md:block md:w-2/5 relative">
            <img src="https://picsum.photos/id/125/1000/1600" alt="Esports gaming setup" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black opacity-60"></div>
            <div class="absolute bottom-10 left-10 right-10 text-white">
                <h2 class="text-3xl font-bold mb-2">Join The Elite</h2>
                <p class="text-lg text-neutral-light">Start your journey to esports mastery today.</p>
            </div>
        </div>

        <!-- Sign Up Form Section (60% on desktop, 100% on mobile) -->
        <div class="w-full md:w-3/5 flex items-center justify-center p-6 md:p-12 overflow-y-auto">
            <div class="w-full max-w-md">
                <!-- Mobile Header -->
                <div class="text-center mb-6 md:hidden">
                    <h2 class="text-3xl font-bold mb-2">Create Account</h2>
                    <p class="text-neutral-dark dark:text-neutral-light">Join the SageCodex community</p>
                </div>

                <!-- Desktop Header -->
                <div class="hidden md:block mb-6">
                    <h2 class="text-3xl font-bold mb-2">Create Your Account</h2>
                    <p class="text-neutral-dark dark:text-neutral-light">Fill in your details to get started</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <!-- Profile Photo Upload -->
                    <div class="flex flex-col items-center mb-5">
                        <div class="w-20 h-20 rounded-full bg-neutral-light dark:bg-neutral-dark overflow-hidden mb-2 relative"
                            id="profile-preview">
                            <img src="https://picsum.photos/200/200?random=1" id="profile-image"
                                class="w-full h-full object-cover" alt="Profile picture">
                        </div>
                        <div class="flex items-center">
                            <label for="profile-upload"
                                class="cursor-pointer text-sm text-brand-primary hover:text-brand-primary-dark font-medium">
                                Upload Photo
                                <input type="file" id="profile-upload" class="hidden" name="photo" type="file" accept="image/*">
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />

                    </div>

                    <div>
                        <div>
                            <label for="first-name" class="block text-sm font-medium mb-1">Complete Name</label>
                            <input name="name" type="text" class="form-input w-full" placeholder="John Doe" required>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input w-full"
                            placeholder="your.email@example.com" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>


                    <div>
                        <label for="password" class="block text-sm font-medium mb-1">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="form-input w-full pr-10"
                                placeholder="••••••••" required>
                            <button type="button" class="absolute inset-y-0 right-0 px-3 flex items-center"
                                id="toggle-password">
                                <i class="fas fa-eye text-neutral-dark dark:text-neutral-light"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full pr-10"
                                placeholder="••••••••" required>
                            <button type="button" class="absolute inset-y-0 right-0 px-3 flex items-center"
                                id="toggle-password">
                                <i class="fas fa-eye text-neutral-dark dark:text-neutral-light"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>

                    <div>
                        <label for="occupation" class="block text-sm font-medium mb-1">Occupation</label>
                        <select id="occupation" name="occupation" class="form-input w-full">
                            <option value="" disabled selected>Select your Occupation</option>
                            <option value="FPS">FPS</option>
                            <option value="MOBA">MOBA</option>
                            <option value="RTS">RTS</option>
                            <option value="Other">Other</option>
                        </select>
                    <x-input-error :messages="$errors->get('occupation')" class="mt-2" />

                    </div>

                    <button type="submit"
                        class="w-full py-3 px-4 rounded-lg bg-brand-primary text-white hover:bg-brand-primary-dark transition-colors font-medium">
                        Create Account
                    </button>
                </form>

                <!-- Sign In Link -->
                <p class="text-center mt-6 text-sm">
                    Already have an account?
                    <a href="signin.html" class="text-brand-primary hover:text-brand-primary-dark font-semibold">Sign in</a>
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

            // Profile photo upload functionality
            const profileUpload = document.getElementById('profile-upload');
            const profileImage = document.getElementById('profile-image');

            if (profileUpload && profileImage) {
                profileUpload.addEventListener('change', function(event) {
                    if (event.target.files && event.target.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            profileImage.src = e.target.result;
                        };

                        reader.readAsDataURL(event.target.files[0]);
                    }
                });
            }
        });
    </script>
@endpush
