@extends('front.layouts.app')
@section('title', 'Success Checkout - Obito BuildWithAngga')
@section('content')
    <x-navigation-auth />

    <!-- Breadcrumb Navigation -->
    <div class="border-b border-neutral-light dark:border-neutral-dark py-3">
        <div class="max-w-7xl px-4 mx-auto">
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('front.index') }}" class="text-neutral-dark dark:text-neutral-light hover:text-brand-primary">Home</a>
                <i class="fas fa-chevron-right text-xs text-neutral-dark dark:text-neutral-light"></i>
                <a href="{{ route('front.pricing') }}"
                    class="text-neutral-dark dark:text-neutral-light hover:text-brand-primary">Pricing</a>
                <i class="fas fa-chevron-right text-xs text-neutral-dark dark:text-neutral-light"></i>
                <a href="{{ route('front.checkout', $pricing) }}"
                    class="text-neutral-dark dark:text-neutral-light hover:text-brand-primary">Checkout</a>
                <i class="fas fa-chevron-right text-xs text-neutral-dark dark:text-neutral-light"></i>
                <span class="text-brand-primary">Success</span>
            </div>
        </div>
    </div>

    <!-- Success Content -->
    <main class="flex flex-col items-center justify-center py-16 px-4">
        <div class="w-full max-w-xl bg-white dark:bg-neutral-darker rounded-2xl shadow-lg p-8 text-center">
            <!-- Success Icon -->
            <div class="flex justify-center mb-6">
                <div class="w-24 h-24 rounded-full bg-brand-primary bg-opacity-10 flex items-center justify-center">
                    <i class="fas fa-check-circle text-5xl text-amber-400"></i>
                </div>
            </div>

            <!-- Success Message -->
            <h1 class="font-bold text-3xl mb-4 gaming-gradient bg-clip-text text-transparent">Payment Successful!</h1>
            <p class="text-neutral-dark dark:text-neutral-light text-lg mb-6">Your                         {{ $pricing->name }}
                subscription has been activated
                successfully.</p>

            <!-- Order Details -->
            <div class="bg-neutral-lightest dark:bg-neutral-darkest rounded-xl p-6 mb-6">
                <div class="flex justify-between mb-3">
                    <span class="text-neutral-dark dark:text-neutral-light">Order ID:</span>
                    <span class="font-semibold">#SG-123456</span>
                </div>
                <div class="flex justify-between mb-3">
                    <span class="text-neutral-dark dark:text-neutral-light">Amount Paid:</span>
                    <span class="font-semibold">$109.98</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-neutral-dark dark:text-neutral-light">Payment Method:</span>
                    <span class="font-semibold">Credit Card (•••• 4242)</span>
                </div>
            </div>

            <!-- Next Steps -->
            <p class="text-neutral-dark dark:text-neutral-light mb-8">We've sent a confirmation email to your registered
                email address.</p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('dashboard.subscriptions') }}"
                    class="bg-brand-primary hover:bg-brand-primary-dark text-white font-semibold py-3 px-8 rounded-full transition-all duration-300">
                    View Subscription
                </a>
                <a href="{{ route('dashboard') }}"
                    class="border border-neutral-light dark:border-neutral-dark hover:border-brand-primary text-neutral-dark dark:text-white font-semibold py-3 px-8 rounded-full transition-all duration-300">
                    Browse Courses
                </a>
            </div>
        </div>
    </main>

@endsection
@push('after-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Profile dropdown functionality
            const dropdownOpener = document.getElementById('dropdown-opener');
            const dropdown = document.getElementById('dropdown');

            if (dropdownOpener && dropdown) {
                dropdownOpener.addEventListener('click', function() {
                    dropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!dropdownOpener.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endpush
