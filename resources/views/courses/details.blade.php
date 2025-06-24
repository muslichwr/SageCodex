@extends('front.layouts.app')
@section('title', 'Course Details - SageCodex')
@section('content')
    <x-navigation-auth />

    <main class="py-8">
        <div class="max-w-5xl mx-auto px-4">
            <div class="mb-6">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-brand-primary mb-4">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Course Catalog</span>
                </a>
            </div>

            <!-- Course Hero Section -->
            <div class="flex flex-col md:flex-row gap-8 mb-10">
                <div class="md:w-7/12">
                    <div class="aspect-16-9 rounded-2xl overflow-hidden">
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="Course Preview"
                            class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="md:w-5/12">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span
                                    class="bg-esports-lol-primary text-white px-3 py-1 rounded-full text-sm font-medium">{{ $course->category->name }}</span>
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-star text-brand-accent"></i>
                                    <span>4.9</span>
                                    <span class="text-neutral-dark dark:text-neutral-light">(324)</span>
                                </span>
                            </div>
                            <h1 class="text-2xl md:text-3xl font-bold mb-3">{{ $course->name }}</h1>
                            <p class="text-neutral-dark dark:text-neutral-light mb-4">
                                {{ $course->about }}
                            </p>
                            <div class="flex flex-wrap gap-4 mb-5">
                                <span class="flex items-center gap-1 text-sm">
                                    <i class="fas fa-user text-brand-primary"></i>
                                    <span>1,245 students</span>
                                </span>
                                <span class="flex items-center gap-1 text-sm">
                                    <i class="fas fa-clock text-brand-primary"></i>
                                    <span>8h 45m total length</span>
                                </span>
                                <span class="flex items-center gap-1 text-sm">
                                    <i class="fas fa-file-alt text-brand-primary"></i>
                                    <span>{{ $course->content_count }} resources</span>
                                </span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('dashboard.course.join', $course->slug) }}"
                                class="w-full bg-brand-primary hover:bg-brand-primary-dark text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                                <i class="fas fa-play-circle"></i>
                                <span>Start Learning Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Content -->
            <div
                class="bg-white dark:bg-neutral-dark rounded-xl p-6 border border-neutral-light dark:border-neutral-dark mb-8">
                <h2 class="text-2xl font-bold mb-4">Course Content</h2>
                <p class="text-neutral-dark dark:text-neutral-light mb-4">5 sections • 24 lessons • 8h 45m total length</p>

                <!-- Accordion Items -->
                <div class="space-y-3" id="accordionCourseContent">
                    <!-- Section 1 -->
                    @foreach ($course->courseSections as $section)
                    <div
                        class="accordion-item border border-neutral-light dark:border-neutral-dark rounded-lg overflow-hidden">
                        <button
                            class="accordion-header w-full flex justify-between items-center p-4 bg-neutral-lightest dark:bg-neutral-dark text-left"
                            data-section="{{ $section->id }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-chevron-right text-brand-primary transform transition-transform"></i>
                                <span class="font-semibold">{{ $section->name }}</span>
                            </div>
                            <span class="text-sm text-neutral-dark dark:text-neutral-light">3 lessons • 45m</span>
                        </button>
                        <div class="accordion-content hidden px-4 py-3 bg-white dark:bg-neutral-darker" id="section-{{ $section->id }}">
                            <ul class="space-y-3">
                                @foreach ($section->sectionContents as $content)
                                <li
                                    class="flex items-center gap-3 py-2 border-b border-neutral-lightest dark:border-neutral-dark">
                                    <i class="fas fa-play-circle text-brand-primary"></i>
                                    <span>{{ $content->name }}</span>
                                    <span class="ml-auto text-sm text-neutral-dark dark:text-neutral-light">15m</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Instructors will go here -->
            <div
                class="bg-white dark:bg-neutral-dark rounded-xl p-6 border border-neutral-light dark:border-neutral-dark mb-8">
                <h2 class="text-2xl font-bold mb-5">Course Instructors</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($course->courseMentors as $mentor)
                        <div class="flex gap-4">
                            <div class="w-16 h-16 rounded-full overflow-hidden flex-shrink-0">
                                <img src="{{ Storage::url($mentor->mentor->photo) }}" alt="Instructor"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">{{ $mentor->mentor->name }}</h3>
                                <p class="text-brand-primary text-sm mb-1">{{ $mentor->mentor->occupation }}</p>
                                <p class="text-sm text-neutral-dark dark:text-neutral-light">{{ $mentor->about }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- What You'll Learn will go here -->
            <div
                class="bg-white dark:bg-neutral-dark rounded-xl p-6 border border-neutral-light dark:border-neutral-dark mb-8">
                <h2 class="text-2xl font-bold mb-4">What You'll Learn</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                    @foreach ($course->benefits as $benefit)
                        <div class="flex items-start gap-3">
                            <span class="text-brand-primary mt-0.5"><i class="fas fa-check-circle"></i></span>
                            <div>
                                <h4 class="font-medium">{{ $benefit->name }}</h4>
                                {{-- <p class="text-sm text-neutral-dark dark:text-neutral-light">{{ $benefit->description }}</p> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>


@endsection
@push('after-scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>


    <!-- Accordion Script -->
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

            // Get all accordion headers
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            // Add click event to each header
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    // Get the section ID from the button's data attribute
                    const sectionId = this.getAttribute('data-section');
                    const content = document.getElementById('section-' + sectionId);
                    const icon = this.querySelector('.fa-chevron-right');

                    // Toggle the content visibility
                    if (content.classList.contains('hidden')) {
                        // Close all accordion contents first
                        document.querySelectorAll('.accordion-content').forEach(item => {
                            item.classList.add('hidden');
                        });

                        // Reset all icons
                        document.querySelectorAll('.accordion-header .fa-chevron-right').forEach(
                            item => {
                                item.classList.remove('rotate-90');
                            });

                        // Open the clicked section
                        content.classList.remove('hidden');
                        icon.classList.add('rotate-90');
                    } else {
                        // Close the section if it's already open
                        content.classList.add('hidden');
                        icon.classList.remove('rotate-90');
                    }
                });
            });
        });
    </script>
@endpush
