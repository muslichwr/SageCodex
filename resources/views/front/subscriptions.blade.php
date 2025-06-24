@extends('front.layouts.app')
@section('title', 'My Subscription - SageCodex')
@section('content')
    <x-navigation-auth />
    <main class="py-8 relative">
        <!-- Background Graphic -->
        <div class="absolute top-0 right-0 w-1/3 h-full overflow-hidden z-0 hidden lg:block">
            <div
                class="absolute inset-0 bg-gradient-to-r from-transparent to-brand-primary/20 dark:to-brand-primary/10 z-10">
            </div>
            <img src="https://picsum.photos/800/1200?random=10" class="w-full h-full object-cover opacity-20 dark:opacity-10"
                alt="Background Pattern">
        </div>

        <!-- Content Container -->
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold mb-2">My Subscriptions</h1>
                <p class="text-neutral-dark dark:text-neutral-light">Manage your active and expired subscriptions</p>
            </div>

            <!-- Subscription Cards -->
            <div class="space-y-4 max-w-4xl">
                <!-- Active Subscription -->

                @forelse($transactions as $transaction)
                    <div
                        class="bg-white dark:bg-neutral-dark border border-neutral-light dark:border-neutral-dark rounded-xl p-5 flex flex-col md:flex-row items-center md:items-stretch gap-4 transition-shadow hover:shadow-md">
                        <!-- Plan Icon & Title -->
                        <div class="flex md:items-center gap-4 w-full md:w-auto">
                            <div
                                class="w-12 h-12 rounded-full bg-brand-primary/10 dark:bg-brand-primary/20 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-trophy text-2xl text-brand-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">{{ $transaction->pricing->name }}</h3>
                                <p class="text-neutral-dark dark:text-neutral-light text-sm">
                                    {{ $transaction->pricing->duration }} months duration</p>
                            </div>
                        </div>

                        <!-- Subscription Info -->
                        <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4 w-full">
                            <!-- Price -->
                            <div class="flex flex-col w-1/2 md:w-auto">
                                <span class="text-xs text-neutral-dark dark:text-neutral-light mb-1">Price</span>
                                <span class="font-semibold">Rp
                                    {{ number_format($transaction->sub_total_amount, 0, '', '.') }}</span>
                            </div>

                            <!-- Start Date -->
                            <div class="flex flex-col w-1/2 md:w-auto">
                                <span class="text-xs text-neutral-dark dark:text-neutral-light mb-1">Started</span>
                                <span class="font-semibold">{{ $transaction->started_at->format('d M, Y') }}</span>
                            </div>

                            <!-- Expires -->
                            <div class="flex flex-col w-1/2 md:w-auto">
                                <span class="text-xs text-neutral-dark dark:text-neutral-light mb-1">Expires</span>
                                <span class="font-semibold">{{ $transaction->ended_at->format('d M, Y') }}</span>
                            </div>


                            @if($transaction->isActive())
                                <div class="w-1/2 md:w-auto flex items-center">
                                    <span
                                        class="px-3 py-1 bg-brand-primary/10 dark:bg-brand-primary/20 text-brand-primary rounded-full text-xs font-semibold">ACTIVE</span>
                                @else
                                    <span
                                        class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-full text-xs font-semibold">EXPIRED</span>
                            @endif
                        </div>

                        <!-- Details Button -->
                        <div class="w-full md:w-auto">
                            <a href="{{ route('dashboard.subscription.details', $transaction) }}" class="btn-primary flex items-center justify-center gap-2">
                                <span>Details</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
            </div>
        @empty
            <div class="col-span-full">
                <p class="text-neutral-dark dark:text-neutral-light">Tidak ada paket</p>
            </div>
            @endforelse
        </div>

        <!-- Browse Plans CTA -->
        <div
            class="mt-10 flex flex-col md:flex-row items-center gap-6 p-6 bg-white dark:bg-neutral-dark border border-neutral-light dark:border-neutral-dark rounded-xl max-w-4xl">
            <div class="w-full md:w-2/3">
                <h3 class="text-xl font-bold mb-2">Looking for more benefits?</h3>
                <p class="text-neutral-dark dark:text-neutral-light">Upgrade your subscription to access premium
                    coaching, exclusive tournaments, and personalized training programs.</p>
            </div>
            <div class="w-full md:w-1/3 flex justify-center md:justify-end">
                <a href="price.html" class="btn-primary px-6 py-3">Browse Plans</a>
            </div>
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
