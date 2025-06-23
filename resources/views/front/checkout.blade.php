@extends('front.layouts.app')
@section('title', 'Checkout - SageCodex')
@section('content')
    <x-navigation-auth />
    <div class="border-b border-neutral-light dark:border-neutral-dark py-3">
        <div class="max-w-7xl px-4 mx-auto">
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('front.index') }}"
                    class="text-neutral-dark dark:text-neutral-light hover:text-brand-primary">Home</a>
                <i class="fas fa-chevron-right text-xs text-neutral-dark dark:text-neutral-light"></i>
                <a href="{{ route('front.pricing') }}"
                    class="text-neutral-dark dark:text-neutral-light hover:text-brand-primary">Pricing</a>
                <i class="fas fa-chevron-right text-xs text-neutral-dark dark:text-neutral-light"></i>
                <a href="{{ route('front.checkout', $pricing) }}" class="text-brand-primary">Checkout</a>
            </div>
        </div>
    </div>

    <!-- Main Checkout Content -->
    <main class="flex flex-1 justify-center py-10 px-4 bg-white dark:bg-neutral-darkest">
        <div
            class="flex flex-col lg:flex-row w-full max-w-6xl rounded-2xl border border-neutral-light dark:border-neutral-dark gap-8 bg-white dark:bg-neutral-darkest shadow-lg">
            <!-- Checkout Form -->
            <form id="checkout-details" method="POST" class="w-full lg:w-7/12 flex flex-col gap-6 p-6 lg:p-8">
                @csrf

                <input type="text" hidden name="payment_method" value="Midtrans">

                <h1 class="font-bold text-2xl gaming-gradient bg-clip-text text-transparent">Checkout {{ $pricing->name }}
                </h1>

                <!-- User Access Section -->
                <section class="flex flex-col gap-3">
                    <h2 class="font-semibold text-neutral-dark dark:text-white">Give Access To</h2>
                    <div
                        class="flex items-center justify-between rounded-xl border border-neutral-light dark:border-neutral-dark p-4">
                        <div class="flex items-center gap-4">
                            <div class="flex justify-center items-center overflow-hidden w-12 h-12 rounded-full">
                                <img src="{{ Storage::url($user->photo) }}" alt="image"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div class="flex flex-col">
                                <h3 class="font-semibold">{{ $user->name }}</h3>
                                <p class="text-sm text-neutral-dark dark:text-neutral-light">{{ $user->occupation }}</p>
                            </div>
                        </div>
                        <a href="#" class="text-sm text-brand-primary hover:underline">Change Account</a>
                    </div>
                </section>

                <!-- Transaction Details Section -->
                <section class="flex flex-col gap-3">
                    <h2 class="font-semibold text-neutral-dark dark:text-white">Transaction Details</h2>
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-file-invoice text-brand-primary"></i>
                                <p class="text-neutral-dark dark:text-white">Subscription Package</p>
                            </div>
                            <strong class="font-semibold">Rp {{ number_format($pricing->price, 0, '', '.') }}</strong>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-clock text-brand-primary"></i>
                                <p class="text-neutral-dark dark:text-white">Access Duration</p>
                            </div>
                            <strong class="font-semibold">{{ $pricing->duration }} Months</strong>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-calendar-check text-brand-primary"></i>
                                <p class="text-neutral-dark dark:text-white">Started At</p>
                            </div>
                            <strong class="font-semibold">{{ $started_at->format('d M, Y') }}</strong>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-calendar-times text-brand-primary"></i>
                                <p class="text-neutral-dark dark:text-white">Ended At</p>
                            </div>
                            <strong class="font-semibold">{{ $ended_at->format('d M, Y') }}</strong>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-percentage text-brand-primary"></i>
                                <p class="text-neutral-dark dark:text-white">PPN (12%)</p>
                            </div>
                            <strong class="font-semibold">Rp {{ number_format($total_tax_amount, 0, '', '.') }}</strong>
                        </div>
                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-coins text-brand-primary"></i>
                                <p class="text-neutral-dark dark:text-white">Grand Total</p>
                            </div>
                            <strong class="font-bold text-xl text-brand-primary">Rp
                                {{ number_format($grand_total_amount, 0, '', '.') }}</strong>
                        </div>
                    </div>
                </section>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <a href="{{ route('front.pricing') }}"
                        class="flex border border-neutral-light dark:border-neutral-dark rounded-full items-center justify-center py-3 hover:border-brand-primary transition-all duration-300 text-neutral-dark dark:text-white">
                        <p class="font-semibold">Cancel</p>
                    </a>
                    <button id="pay-button" type="submit"
                        class="flex text-white bg-brand-primary rounded-full items-center justify-center py-3 hover:bg-brand-primary-dark transition-all duration-300">
                        <p class="font-semibold">Pay Now</p>
                    </button>
                </div>

                <hr class="border-neutral-light dark:border-neutral-dark" />
                <p class="text-sm text-center text-neutral-dark dark:text-neutral-light">By proceeding, you agree to our <a
                        href="#" class="text-brand-primary hover:underline">Terms & Conditions</a></p>
            </form>

            <!-- Benefits Section -->
            <div class="bg-neutral-lightest dark:bg-neutral-darker rounded-2xl overflow-hidden lg:w-5/12 flex flex-col">
                <!-- Thumbnail Image -->
                <section class="relative flex justify-center h-64 items-center overflow-hidden">
                    <img src="https://picsum.photos/800/400?random=2" alt="Pro Gamer Package"
                        class="w-full h-full object-cover" />
                </section>

                <!-- Benefits List -->
                <section class="pt-16 relative flex flex-col gap-4 px-6 pb-6">
                    <!-- Package Card -->
                    <div
                        class="absolute -top-12 left-6 right-6 flex items-center p-4 gap-4 border border-neutral-light dark:border-neutral-dark rounded-xl bg-white dark:bg-neutral-darkest shadow-lg">
                        <div class="w-12 h-12 rounded-full bg-brand-primary flex items-center justify-center text-white">
                            <i class="fas fa-trophy text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg gaming-gradient bg-clip-text text-transparent">
                                {{ $pricing->name }}</h3>
                            <p class="text-neutral-dark dark:text-neutral-light">{{ $pricing->duration }} months duration
                            </p>
                        </div>
                    </div>

                    <!-- Benefits Points -->
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-primary"></i>
                        <p class="font-semibold text-neutral-dark dark:text-white">Access 300+ Esports Courses</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-primary"></i>
                        <p class="font-semibold text-neutral-dark dark:text-white">Pro Player Coaching Sessions</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-primary"></i>
                        <p class="font-semibold text-neutral-dark dark:text-white">Tournament Strategy Analysis</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-primary"></i>
                        <p class="font-semibold text-neutral-dark dark:text-white">Exclusive Discord Community</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-primary"></i>
                        <p class="font-semibold text-neutral-dark dark:text-white">24/7 Support for Members</p>
                    </div>
                </section>
            </div>
        </div>
    </main>

@endsection
@push('after-scripts')
    {{-- <script src="{{ asset('js/dropdown-navbar.js') }}"></script> --}}

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <script type="text/javascript">
        const payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();
            // Fetch the Snap token from your backend
            fetch('{{ route('front.payment_store_midtrans') }}', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        // Any additional data you want to send with the request
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snap_token) {
                        // Trigger Midtrans Snap payment popup
                        snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                window.location.href = "{{ route('front.checkout.success') }}";
                            },
                            onPending: function(result) {
                                alert('Payment pending!');
                                window.location.href = "{{ route('front.index') }}";
                            },
                            onError: function(result) {
                                alert('Payment failed: ' + result.status_message);
                                window.location.href = "{{ route('front.index') }}";
                            },
                            onClose: function() {
                                alert('Payment popup closed');
                                window.location.href = "{{ route('front.index') }}";
                            }
                        });
                    } else {
                        alert('Error: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
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
