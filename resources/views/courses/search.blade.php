@extends('front.layouts.app')
@section('title', 'Courses - SageCodex')
@section('content')
    <x-navigation-auth />
    <main class="flex flex-col gap-10 py-12">
        <!-- Search Header -->
        <div class="flex flex-col items-center gap-3 max-w-2xl w-full mx-auto px-4">
            <h1 class="font-bold text-3xl text-center gaming-gradient bg-clip-text text-transparent">Explore Our Elite Esports Courses</h1>
            <!-- Search Form -->
            <form method="GET" action="{{ route('dashboard.search.courses') }}" class="relative w-full mt-4">
                <div class="flex items-center">
                    <input type="text"
                        name="search" 
                           class="form-input pl-5 pr-12 py-4 w-full rounded-full border-2 border-neutral-light dark:border-neutral-dark focus:border-brand-primary dark:focus:border-brand-primary" 
                           placeholder="Search for courses, games, or skills">
                    </button>
                </div>
            </form>
        </div>

        <!-- Search Results Section -->
        <section class="max-w-7xl mx-auto px-4 w-full">
            <h2 class="font-bold text-2xl mb-6">Search Results: <span class="text-brand-primary">League of Legends</span></h2>
            
            <!-- Results Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($courses as $course)
                <x-course-card :course="$course" />
                @empty
                <div class="col-span-full">
                    <p class="text-neutral-dark dark:text-neutral-light">No courses found</p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <div class="inline-flex items-center rounded-full border border-neutral-light dark:border-neutral-dark">
                    <button class="p-2 px-4 text-neutral-dark dark:text-white hover:text-brand-primary dark:hover:text-brand-primary transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="p-2 px-4 bg-brand-primary text-white rounded-full">1</button>
                    <button class="p-2 px-4 text-neutral-dark dark:text-white hover:text-brand-primary dark:hover:text-brand-primary transition-colors">2</button>
                    <button class="p-2 px-4 text-neutral-dark dark:text-white hover:text-brand-primary dark:hover:text-brand-primary transition-colors">3</button>
                    <button class="p-2 px-4 text-neutral-dark dark:text-white hover:text-brand-primary dark:hover:text-brand-primary transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
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
    });
</script>
@endpush
