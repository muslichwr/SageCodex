@extends('front.layouts.app')
@section('title', 'Courses - SageCodex')
@section('content')
    <x-navigation-auth />

    <!-- Main Content -->
    <main class="flex flex-col gap-10 py-8">
        <!-- Popular Roadmaps Section -->
        <section id="roadmap" class="flex flex-col w-full max-w-7xl px-4 gap-6 mx-auto">
            <h2 class="font-bold text-2xl">Popular Roadmaps</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Roadmap Card 1 -->
                <a href="#" class="card hover-scale hover:shadow-lg transition-all duration-300">
                    <div
                        class="roadmap-card flex flex-col rounded-xl border border-neutral-light dark:border-neutral-dark bg-white dark:bg-neutral-dark h-full overflow-hidden">
                        <div class="relative w-full h-40 overflow-hidden bg-neutral-light dark:bg-neutral-darker">
                            <img src="https://picsum.photos/id/169/800/600" class="w-full h-full object-cover"
                                alt="League of Legends Pro Player Training">
                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black/70 to-transparent">
                                <span
                                    class="text-white text-xs font-semibold px-2 py-1 rounded-full bg-brand-primary inline-flex items-center gap-1">
                                    <i class="fas fa-star text-xs"></i> Featured
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 p-4">
                            <h3 class="font-bold text-lg line-clamp-2">League of Legends Pro Player Path 2023</h3>
                            <div class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
                                <i class="fas fa-trophy text-brand-primary"></i>
                                <span class="text-sm">Advanced Skill Level</span>
                            </div>
                            <div class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
                                <i class="fas fa-book text-brand-primary"></i>
                                <span class="text-sm">24 Courses</span>
                            </div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="skill-badge skill-badge-pro">Pro Tier</span>
                                <span
                                    class="text-xs bg-black/10 dark:bg-white/10 px-2 py-1 rounded-full text-neutral-dark dark:text-neutral-light">12-week
                                    program</span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Roadmap Card 2 -->
                <a href="#" class="card hover-scale hover:shadow-lg transition-all duration-300">
                    <div
                        class="roadmap-card flex flex-col rounded-xl border border-neutral-light dark:border-neutral-dark bg-white dark:bg-neutral-dark h-full overflow-hidden">
                        <div class="relative w-full h-40 overflow-hidden bg-neutral-light dark:bg-neutral-darker">
                            <img src="https://picsum.photos/id/119/800/600" class="w-full h-full object-cover"
                                alt="Valorant Master Class">
                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black/70 to-transparent">
                                <span
                                    class="text-white text-xs font-semibold px-2 py-1 rounded-full bg-brand-primary inline-flex items-center gap-1">
                                    <i class="fas fa-star text-xs"></i> Featured
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 p-4">
                            <h3 class="font-bold text-lg line-clamp-2">Valorant Ultimate Aim Training & Tactics Package</h3>
                            <div class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
                                <i class="fas fa-trophy text-brand-primary"></i>
                                <span class="text-sm">Intermediate to Pro</span>
                            </div>
                            <div class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
                                <i class="fas fa-book text-brand-primary"></i>
                                <span class="text-sm">18 Courses</span>
                            </div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="skill-badge skill-badge-advanced">Advanced</span>
                                <span
                                    class="text-xs bg-black/10 dark:bg-white/10 px-2 py-1 rounded-full text-neutral-dark dark:text-neutral-light">8-week
                                    program</span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Roadmap Card 3 (New) -->
                <a href="#" class="card hover-scale hover:shadow-lg transition-all duration-300">
                    <div
                        class="roadmap-card flex flex-col rounded-xl border border-neutral-light dark:border-neutral-dark bg-white dark:bg-neutral-dark h-full overflow-hidden">
                        <div class="relative w-full h-40 overflow-hidden bg-neutral-light dark:bg-neutral-darker">
                            <img src="https://picsum.photos/id/239/800/600" class="w-full h-full object-cover"
                                alt="CS:GO Elite Training">
                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black/70 to-transparent">
                                <span
                                    class="text-white text-xs font-semibold px-2 py-1 rounded-full bg-brand-primary inline-flex items-center gap-1">
                                    <i class="fas fa-star text-xs"></i> Featured
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 p-4">
                            <h3 class="font-bold text-lg line-clamp-2">CS:GO Elite Training Program</h3>
                            <div class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
                                <i class="fas fa-trophy text-brand-primary"></i>
                                <span class="text-sm">Advanced Skill Level</span>
                            </div>
                            <div class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
                                <i class="fas fa-book text-brand-primary"></i>
                                <span class="text-sm">20 Courses</span>
                            </div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="skill-badge skill-badge-pro">Pro Tier</span>
                                <span
                                    class="text-xs bg-black/10 dark:bg-white/10 px-2 py-1 rounded-full text-neutral-dark dark:text-neutral-light">10-week
                                    program</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!-- Course Catalog Section -->
        <section id="catalog" class="flex flex-col w-full max-w-7xl px-4 gap-6 mx-auto">
            <h2 class="font-bold text-2xl">Course Catalog</h2>

            <!-- Game Category Tabs -->
            <div id="tabs-container" class="flex items-center gap-3 overflow-x-auto pb-2">

                @foreach ($coursesByCategory as $category => $courses)
                <button type="button" class="tab-btn {{ $loop->first ? 'tab-active' : '' }}" 
                    data-target="{{ Str::slug($category) }}-content">
                    <div
                        class="rounded-full border border-neutral-light dark:border-neutral-dark py-2 px-6 hover:border-brand-primary dark:hover:border-brand-primary transition-all duration-300 {{ $loop->first ? 'bg-brand-primary text-white' : 'bg-white dark:bg-neutral-dark' }}">
                        <span class="font-medium">
                            {{ $category }}
                        </span>
                    </div>
                </button>
                @endforeach

            </div>

            <!-- Tab Contents Container -->
            <div id="tabs-content-container">


                @foreach ($coursesByCategory as $category => $courses)
                <div id="{{ Str::slug($category) }}-content"
                    class="{{ $loop->first ? '' : 'hidden' }} tab-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                    @forelse($courses as $course)
                    <x-course-card :course="$course" />

                @empty
                <div class="col-span-full">
                    <p class="text-neutral-dark dark:text-neutral-light">No courses found</p>
                </div>
                @endforelse

                </div>
                @endforeach
            </div>

        </section>
    </main>

@endsection
@push('after-scripts')
<script src="{{ asset('js/tabs.js') }}"></script>
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
            
            // Clone all course cards to "all" tab
            const allTab = document.getElementById('all');
            const gameTabs = ['lol', 'valorant', 'csgo', 'dota', 'fortnite'];

            if (allTab) {
                gameTabs.forEach(gameId => {
                    const gameTab = document.getElementById(gameId);
                    if (gameTab) {
                        const courseCards = gameTab.querySelectorAll('.course-card');
                        courseCards.forEach(card => {
                            const clone = card.cloneNode(true);
                            allTab.appendChild(clone);
                        });
                    }
                });
            }

            // Search functionality
            const searchInput = document.getElementById('course-search');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    filterCourses(this.value);
                });
            }

            // Skill level filtering
            const skillFilter = document.getElementById('skill-filter');
            if (skillFilter) {
                skillFilter.addEventListener('change', function() {
                    applyFilters();
                });
            }

            // Handle tab buttons
            const tabButtons = document.querySelectorAll('.tab-btn');
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('tab-active');
                        const btnDiv = btn.querySelector('div');
                        btnDiv.classList.remove('bg-brand-primary');
                        btnDiv.classList.remove('text-white');
                        btnDiv.classList.add('bg-white');
                        btnDiv.classList.add('dark:bg-neutral-dark');
                    });

                    // Add active class to clicked button
                    this.classList.add('tab-active');
                    const thisDiv = this.querySelector('div');
                    thisDiv.classList.add('bg-brand-primary');
                    thisDiv.classList.add('text-white');
                    thisDiv.classList.remove('bg-white');
                    thisDiv.classList.remove('dark:bg-neutral-dark');

                    // Hide all content
                    const tabContents = document.querySelectorAll('.tab-content');
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Show selected content
                    const targetId = this.getAttribute('data-target');
                    const targetContent = document.getElementById(targetId);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                    }

                    // Reapply any active filters
                    applyFilters();
                });
            });

            // Combined filtering function
            function applyFilters() {
                const searchQuery = searchInput ? searchInput.value.toLowerCase() : '';
                const skillLevel = skillFilter ? skillFilter.value : 'all';
                
                // Get the active tab ID using the correct selector
                const activeTab = document.querySelector('.tab-btn.tab-active');
                if (!activeTab) return;
                
                const activeTabId = activeTab.getAttribute('data-target');
                const activeTabContent = document.getElementById(activeTabId);
                if (!activeTabContent) return;
                
                let visibleCount = 0;

                // Get all course cards in the active tab
                const courseCards = activeTabContent.querySelectorAll('.course-card');

                courseCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const game = card.querySelector('.text-sm').textContent.toLowerCase();
                    const cardSkill = card.getAttribute('data-skill') || '';

                    // Apply search filter
                    const matchesSearch = searchQuery === '' || title.includes(searchQuery) || game
                        .includes(searchQuery);

                    // Apply skill filter
                    const matchesSkill = skillLevel === 'all' || cardSkill === skillLevel;

                    // Show/hide card based on combined filters
                    if (matchesSearch && matchesSkill) {
                        card.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                    }
                });

                // Update results counter
                const resultsCounter = document.getElementById('results-counter');
                if (resultsCounter) {
                    resultsCounter.textContent = visibleCount;
                }

                // Show/hide empty results message
                const emptyResults = document.getElementById('empty-results');
                if (emptyResults) {
                    if (visibleCount === 0) {
                        emptyResults.classList.remove('hidden');
                    } else {
                        emptyResults.classList.add('hidden');
                    }
                }
            }

            // Initialize filtering
            setTimeout(() => {
                applyFilters();
            }, 100);
        });
    </script>
@endpush
