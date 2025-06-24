@extends('front.layouts.app')
@section('title', 'My Subscription - SageCodex')
@section('content')
    <x-navigation-auth />
    <!-- Breadcrumb Navigation -->
    <div class="border-b border-neutral-light dark:border-neutral-dark py-3">
        <div class="max-w-7xl px-4 mx-auto">
            <div class="flex items-center gap-2 text-sm">
                <a href="#" class="text-neutral-dark dark:text-neutral-light hover:text-brand-primary">Dashboard</a>
                <i class="fas fa-chevron-right text-xs text-neutral-dark dark:text-neutral-light"></i>
                <a href="my-subscriptions.html" class="text-neutral-dark dark:text-neutral-light hover:text-brand-primary">My
                    Subscriptions</a>
                <i class="fas fa-chevron-right text-xs text-neutral-dark dark:text-neutral-light"></i>
                <span class="text-brand-primary">Subscription Details</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="py-8 relative">
        <!-- Background Graphic -->
        <div class="absolute top-0 right-0 w-1/3 h-full overflow-hidden z-0 hidden lg:block">
            <div
                class="absolute inset-0 bg-gradient-to-r from-transparent to-brand-primary/20 dark:to-brand-primary/10 z-10">
            </div>
            <img src="https://picsum.photos/800/1200?random=42"
                class="w-full h-full object-cover opacity-20 dark:opacity-10" alt="Background Pattern">
        </div>

        <!-- Content Container -->
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold mb-2">Subscription Details</h1>
                <p class="text-neutral-dark dark:text-neutral-light">View detailed information about your subscription</p>
            </div>

            <!-- Subscription Details Container -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-6xl">
                <!-- Transaction and User Details Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Subscription ID Card -->
                    <div
                        class="bg-white dark:bg-neutral-dark border border-neutral-light dark:border-neutral-dark rounded-xl p-5">
                        <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-full bg-brand-primary/10 dark:bg-brand-primary/20 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-user-shield text-2xl text-brand-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-neutral-dark dark:text-neutral-light">Subscription ID</p>
                                    <p class="font-semibold">{{ $transaction->booking_trx_id }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                @if ($transaction->isActive())
                                    <span
                                        class="px-3 py-1 bg-brand-primary/10 dark:bg-brand-primary/20 text-brand-primary rounded-full text-xs font-semibold">ACTIVE</span>
                                @else
                                    <span
                                        class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-full text-xs font-semibold">EXPIRED</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Details -->
                    <div
                        class="bg-white dark:bg-neutral-dark border border-neutral-light dark:border-neutral-dark rounded-xl p-5">
                        <h2 class="font-bold text-lg mb-4">Transaction Details</h2>
                        <div class="space-y-4">
                            <div
                                class="flex items-center justify-between border-b border-neutral-light dark:border-neutral-dark pb-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-tag text-brand-primary"></i>
                                    <p>Subscription Package</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($transaction->sub_total_amount, 0, '', '.') }}</p>
                            </div>

                            <div
                                class="flex items-center justify-between border-b border-neutral-light dark:border-neutral-dark pb-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-clock text-brand-primary"></i>
                                    <p>Access Duration</p>
                                </div>
                                <p class="font-semibold">{{ $transaction->pricing->duration }} Months</p>
                            </div>

                            <div
                                class="flex items-center justify-between border-b border-neutral-light dark:border-neutral-dark pb-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-calendar-plus text-brand-primary"></i>
                                    <p>Started At</p>
                                </div>
                                <p class="font-semibold">{{ $transaction->started_at->format('d M, Y') }}</p>
                            </div>

                            <div
                                class="flex items-center justify-between border-b border-neutral-light dark:border-neutral-dark pb-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-calendar-times text-brand-primary"></i>
                                    <p>Expires At</p>
                                </div>
                                <p class="font-semibold">{{ $transaction->ended_at->format('d M, Y') }}</p>
                            </div>

                            <div
                                class="flex items-center justify-between border-b border-neutral-light dark:border-neutral-dark pb-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-percentage text-brand-primary"></i>
                                    <p>Tax (12%)</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($transaction->total_tax_amount, 0, '', '.') }}</p>
                            </div>

                            <div class="flex items-center justify-between pt-2">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-receipt text-brand-primary"></i>
                                    <p class="font-bold">Grand Total</p>
                                </div>
                                <p class="font-bold text-xl text-brand-primary">Rp {{ number_format($transaction->grand_total_amount, 0, '', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- User Details -->
                    <div
                        class="bg-white dark:bg-neutral-dark border border-neutral-light dark:border-neutral-dark rounded-xl p-5">
                        <h2 class="font-bold text-lg mb-4">Subscription Owner</h2>
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-brand-primary">
                                <img src="{{ Storage::url($transaction->student->photo )}}" alt="Profile photo"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">{{ $transaction->student->name }}</h3>
                                <p class="text-neutral-dark dark:text-neutral-light">{{ $transaction->student->occupation }}</p>
                                <p class="text-sm text-brand-primary mt-1">Active Member Since {{ $transaction->student->created_at->format('d M, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subscription Plan and Benefits Column -->
                <div class="space-y-6">
                    <!-- Plan Card -->
                    <div
                        class="bg-white dark:bg-neutral-dark border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                        <!-- Plan Header with Image -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://picsum.photos/600/400?random=25" alt="Elite Pro Plan"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-5">
                                <div class="text-white">
                                    <h3 class="font-bold text-2xl">Elite Pro</h3>
                                    <p class="opacity-90">6 months membership</p>
                                </div>
                            </div>
                        </div>

                        <!-- Plan Benefits -->
                        <div class="p-5 space-y-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-trophy text-white text-sm"></i>
                                </div>
                                <p class="font-semibold">Access to Pro Tournaments</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                                </div>
                                <p class="font-semibold">500+ Advanced Courses</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-headset text-white text-sm"></i>
                                </div>
                                <p class="font-semibold">10 Hours of 1-on-1 Coaching</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-gamepad text-white text-sm"></i>
                                </div>
                                <p class="font-semibold">Weekly VIP Practice Sessions</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-chart-line text-white text-sm"></i>
                                </div>
                                <p class="font-semibold">Advanced Analytics Dashboard</p>
                            </div>
                        </div>

                        <!-- Plan Actions -->
                        <div class="border-t border-neutral-light dark:border-neutral-dark p-5">
                            <button class="btn-primary w-full justify-center">
                                Renew Subscription
                            </button>
                            <button
                                class="w-full text-center mt-3 text-neutral-dark dark:text-neutral-light hover:text-brand-primary dark:hover:text-brand-primary transition-colors">
                                Cancel Auto-Renewal
                            </button>
                        </div>
                    </div>
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
