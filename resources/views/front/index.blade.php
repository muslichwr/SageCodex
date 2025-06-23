@extends('front.layouts.app')
@section('title', 'Home - SageCodex')
@section('content')
    <x-nav-guest />
    <main class="flex-grow relative flex items-center py-8 md:py-0">
        <!-- Background graphic with abstract gaming pattern -->
        <div class="absolute inset-0 overflow-hidden z-0">
            <div
                class="absolute inset-0 bg-gradient-to-r from-white dark:from-neutral-darkest via-white dark:via-neutral-darkest to-transparent z-10">
            </div>
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 opacity-20 dark:opacity-10 bg-repeat"
                    style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
                <div class="absolute right-0 bottom-0 w-1/2 h-1/2 opacity-10 dark:opacity-5">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#8A3FFC"
                            d="M46.3,-64.2C59.9,-56.7,70.5,-42.8,75.7,-27.2C80.9,-11.5,80.8,5.8,75.6,21.5C70.5,37.2,60.5,51.3,47.1,60.7C33.6,70,16.8,74.6,0.4,74.1C-16,73.5,-32.1,67.8,-46.3,58.3C-60.5,48.9,-73,35.8,-79.4,19.9C-85.8,4,-86.2,-14.7,-79.1,-30.1C-71.9,-45.4,-57.3,-57.4,-42,-63.7C-26.7,-70,-13.4,-70.7,1.4,-72.7C16.2,-74.6,32.4,-77.8,46.3,-64.2Z"
                            transform="translate(100 100)" />
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="w-full max-w-7xl mx-auto px-4 flex flex-col lg:flex-row items-center justify-between gap-12 relative z-10 py-10 md:py-0">
            <!-- Left Content -->
            <div class="flex flex-col max-w-xl gap-8 lg:py-16">
                <div class="flex flex-col gap-6">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-brand-primary bg-opacity-10 dark:bg-opacity-20 rounded-full w-fit">
                        <i class="fas fa-trophy text-brand-accent"></i>
                        <span class="font-bold text-lg">TRUSTED BY 5000+ PRO GAMERS</span>
                    </div>

                    <div>
                        <h1 class="hero-title text-4xl md:text-6xl font-extrabold leading-tight" data-aos="fade-up">Level Up
                            Your <span class="gaming-gradient bg-clip-text text-transparent">Gaming Skills</span></h1>
                        <p class="mt-4 text-neutral-dark dark:text-neutral-light text-xl" data-aos="fade-up"
                            data-aos-delay="100">Learn from professional esports athletes and coaches. Master advanced
                            strategies and techniques for your favorite games.</p>
                    </div>

                    <!-- Game icons row -->
                    <div class="flex flex-wrap gap-4 py-3" data-aos="fade-up" data-aos-delay="150">
                        <div class="flex flex-col items-center gap-1 hover:scale-110 transition-transform duration-300">
                            <div
                                class="w-12 h-12 rounded-full bg-esports-lol-primary bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-gamepad text-esports-lol-primary"></i>
                            </div>
                            <span class="text-xs font-medium">League of Legends</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 hover:scale-110 transition-transform duration-300">
                            <div
                                class="w-12 h-12 rounded-full bg-esports-valorant-primary bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-bullseye text-esports-valorant-primary"></i>
                            </div>
                            <span class="text-xs font-medium">Valorant</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 hover:scale-110 transition-transform duration-300">
                            <div
                                class="w-12 h-12 rounded-full bg-esports-csgo-primary bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-crosshairs text-esports-csgo-primary"></i>
                            </div>
                            <span class="text-xs font-medium">CS:GO</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 hover:scale-110 transition-transform duration-300">
                            <div
                                class="w-12 h-12 rounded-full bg-esports-dota-primary bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-shield-alt text-esports-dota-primary"></i>
                            </div>
                            <span class="text-xs font-medium">Dota 2</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 hover:scale-110 transition-transform duration-300">
                            <div
                                class="w-12 h-12 rounded-full bg-brand-accent bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-plus text-brand-accent"></i>
                            </div>
                            <span class="text-xs font-medium">More Games</span>
                        </div>
                    </div>

                    <!-- Key features -->
                    <div class="grid grid-cols-2 gap-3" data-aos="fade-up" data-aos-delay="200">
                        <div
                            class="flex items-center gap-2 p-2 rounded-lg hover:bg-neutral-light hover:dark:bg-neutral-darker transition-colors duration-300">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium text-sm">Professional Coaching</span>
                        </div>
                        <div
                            class="flex items-center gap-2 p-2 rounded-lg hover:bg-neutral-light hover:dark:bg-neutral-darker transition-colors duration-300">
                            <i class="fas fa-chart-line text-blue-500"></i>
                            <span class="font-medium text-sm">Performance Analytics</span>
                        </div>
                        <div
                            class="flex items-center gap-2 p-2 rounded-lg hover:bg-neutral-light hover:dark:bg-neutral-darker transition-colors duration-300">
                            <i class="fas fa-user-cog text-purple-500"></i>
                            <span class="font-medium text-sm">Personalized Training</span>
                        </div>
                        <div
                            class="flex items-center gap-2 p-2 rounded-lg hover:bg-neutral-light hover:dark:bg-neutral-darker transition-colors duration-300">
                            <i class="fas fa-users text-brand-accent"></i>
                            <span class="font-medium text-sm">Community Support</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4 pt-4" data-aos="fade-up" data-aos-delay="250">
                        <a href="catalog-v2.html"
                            class="px-8 py-4 rounded-full bg-brand-primary text-white hover:bg-brand-primary-dark transition-colors relative overflow-hidden group">
                            <span
                                class="absolute inset-0 w-full h-full bg-white/10 scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500"></span>
                            <span class="font-semibold text-lg relative z-10">Explore Courses</span>
                        </a>
                        <a href="#"
                            class="flex items-center gap-3 px-8 py-4 rounded-full border border-neutral-light dark:border-neutral-dark hover:border-brand-primary dark:hover:border-brand-primary transition-colors group">
                            <div
                                class="w-6 h-6 rounded-full bg-brand-primary flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-play text-white text-xs"></i>
                            </div>
                            <span class="font-semibold text-lg">How It Works</span>
                        </a>
                    </div>
                </div>

                <!-- Stats and community -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="flex flex-col gap-3 p-4 rounded-xl border border-neutral-light dark:border-neutral-dark hover:border-brand-primary dark:hover:border-brand-primary transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex -space-x-4">
                                <img src="https://randomuser.me/api/portraits/men/42.jpg"
                                    class="w-14 h-14 rounded-full border-2 border-white dark:border-neutral-darkest hover:scale-110 transition-transform duration-300"
                                    alt="User">
                                <img src="https://randomuser.me/api/portraits/women/24.jpg"
                                    class="w-14 h-14 rounded-full border-2 border-white dark:border-neutral-darkest hover:scale-110 transition-transform duration-300"
                                    alt="User">
                                <img src="https://randomuser.me/api/portraits/men/56.jpg"
                                    class="w-14 h-14 rounded-full border-2 border-white dark:border-neutral-darkest hover:scale-110 transition-transform duration-300"
                                    alt="User">
                                <img src="https://randomuser.me/api/portraits/women/65.jpg"
                                    class="w-14 h-14 rounded-full border-2 border-white dark:border-neutral-darkest hover:scale-110 transition-transform duration-300"
                                    alt="User">
                            </div>
                            <div class="py-1 px-3 bg-brand-secondary bg-opacity-10 dark:bg-opacity-20 rounded-full">
                                <span class="text-brand-secondary text-xs font-semibold">Certified Pro</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <div class="flex">
                                    <i class="fas fa-star text-brand-accent"></i>
                                    <i class="fas fa-star text-brand-accent"></i>
                                    <i class="fas fa-star text-brand-accent"></i>
                                    <i class="fas fa-star text-brand-accent"></i>
                                    <i class="fas fa-star text-brand-accent"></i>
                                </div>
                                <span class="font-bold text-lg">4.9</span>
                                <span class="text-sm text-neutral-dark dark:text-neutral-light">(2,340 reviews)</span>
                            </div>
                            <p class="mt-1 text-sm font-medium">Join our thriving community of 20,000+ competitive gamers
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 text-center" data-aos="fade-up" data-aos-delay="350">
                        <div
                            class="p-4 border border-neutral-light dark:border-neutral-dark rounded-xl hover:border-brand-primary dark:hover:border-brand-primary transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                            <p class="font-bold text-3xl gaming-gradient bg-clip-text text-transparent">100+</p>
                            <p class="text-sm text-neutral-dark dark:text-neutral-light">Pro Coaches</p>
                            <p class="text-xs mt-1 text-neutral-dark dark:text-neutral-light">From top esports teams</p>
                        </div>
                        <div
                            class="p-4 border border-neutral-light dark:border-neutral-dark rounded-xl hover:border-brand-primary dark:hover:border-brand-primary transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                            <p class="font-bold text-3xl gaming-gradient bg-clip-text text-transparent">250+</p>
                            <p class="text-sm text-neutral-dark dark:text-neutral-light">Courses</p>
                            <p class="text-xs mt-1 text-neutral-dark dark:text-neutral-light">Updated weekly</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content (Hero Image) -->
            <div class="flex-1 flex justify-center lg:justify-end items-center lg:h-[calc(100vh-80px)] py-10 lg:py-16">
                <div class="relative" data-aos="zoom-in" data-aos-delay="200">
                    <!-- Decorative elements -->
                    <div class="absolute -inset-6 bg-brand-primary rounded-full opacity-20 blur-xl animate-pulse"></div>
                    <div class="absolute -top-4 -left-8 w-16 h-16 bg-brand-secondary opacity-30 rounded-full blur-xl">
                    </div>
                    <div class="absolute -bottom-6 -right-4 w-20 h-20 bg-brand-accent opacity-20 rounded-full blur-lg">
                    </div>

                    <!-- Main image -->
                    <div
                        class="relative rounded-3xl w-full max-w-xl overflow-hidden shadow-xl border border-neutral-light dark:border-neutral-dark">
                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="w-full object-cover hover:scale-105 transition-transform duration-700"
                            alt="Professional gaming setup">

                        <!-- Live coaching badge -->
                        <div
                            class="absolute top-4 right-4 bg-white dark:bg-neutral-darkest rounded-xl p-3 shadow-lg hover:scale-110 transition-transform">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-500 text-white flex items-center justify-center relative">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <i class="fas fa-headset relative"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-semibold">Live Coaching</span>
                                    <span class="text-xs text-green-500">Available Now</span>
                                </div>
                            </div>
                        </div>

                        <!-- Game levels -->
                        <div
                            class="absolute bottom-4 left-4 right-4 bg-white dark:bg-neutral-darkest bg-opacity-90 dark:bg-opacity-90 rounded-xl p-3 shadow-lg backdrop-blur-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-xs font-bold">Game Levels</span>
                                <span class="text-xs text-brand-accent">View all</span>
                            </div>
                            <div class="flex mt-2 gap-2">
                                <div class="flex-1 h-2 rounded-full bg-neutral-light dark:bg-neutral-dark overflow-hidden">
                                    <div class="h-full bg-green-500 rounded-full" style="width: 75%"></div>
                                </div>
                                <span class="text-xs font-medium">75%</span>
                            </div>
                            <div class="flex items-center justify-between text-xs mt-1">
                                <span>Beginner</span>
                                <span>Pro</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('after-scripts')
    <script>
        < link href = "{{ asset('https://unpkg.com/aos@2.3.1/dist/aos.css') }}"
        rel = "stylesheet" >
            <
            link href = "{{ asset('css/animations.css') }}"
        rel = "stylesheet" >
            <
            script src = "{{ asset('https://unpkg.com/aos@2.3.1/dist/aos.js') }}" >
    </script>
    <script src="{{ asset('js/darkMode.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    </script>
@endpush
