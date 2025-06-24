@extends('front.layouts.app')
@section('title', 'Course Learning - SageCodex')
@section('content')


    <div class="fixed top-0 left-0 right-0 z-50">
        <div class="progress-bar w-0" id="reading-progress"></div>
    </div>

    <!-- Mobile menu toggle -->
    <button id="sidebar-toggle"
        class="fixed top-4 left-4 z-40 bg-brand-primary text-white p-2 rounded-full shadow-lg hidden md:hidden">
        <i class="fas fa-bars"></i>
    </button>

    <div class="flex h-screen">
        <!-- Sidebar with course navigation -->
        <aside id="sidebar"
            class="sidebar flex flex-col border border-neutral-light bg-white shadow-lg fixed md:relative h-full z-30">
            <div class="p-5 flex flex-col gap-5">
                <div class="flex items-center gap-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2 py-2 px-4 rounded-full border border-neutral-light hover:border-brand-primary transition-all duration-300">
                        <i class="fas fa-arrow-left text-brand-primary"></i>
                        <span class="font-medium">Back to Dashboard</span>
                    </a>
                </div>
                <header class="flex flex-col gap-3">
                    <div class="overflow-hidden w-full h-24 rounded-lg">
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="Course thumbnail"
                            class="w-full h-full object-cover" />
                    </div>
                    <h1 class="font-bold text-lg gaming-gradient">{{ $course->name }}</h1>
                    <div class="flex items-center gap-2 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-book-open mr-1 text-brand-primary"></i>
                            <span>{{ $course->content_count }} lessons</span>
                        </div>
                        <span>•</span>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-1 text-brand-primary"></i>
                            <span>4.5 hours</span>
                        </div>
                    </div>
                </header>
                <hr class="border-neutral-light" />
            </div>

            <div id="lessons-container" class="h-full overflow-y-auto pb-20">
                <nav class="px-5 pb-8 flex flex-col gap-4">
                    <!-- Course sections with accordion functionality -->
                    @foreach ($course->courseSections as $section)
                        <div class="lesson accordion flex flex-col gap-3">
                            <button type="button" data-expand="{{ $section->id }}" class="flex items-center justify-between">
                                <h2 class="font-semibold">{{ $section->name }}</h2>
                                <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                            </button>
                            <div id="{{ $section->id }}" class="hidden">
                                <ul class="flex flex-col gap-3 mt-1">
                                    @foreach ($section->sectionContents as $content)
                                        <li>
                                            <a
                                                href="{{ route('dashboard.course.learning', [
                                                    'course' => $course->slug,
                                                    'courseSection' => $section->id,
                                                    'sectionContent' => $content->id,
                                                ]) }}">
                                                <div
                                                    class="lesson-item 
                                        {{ $currentSection && $section->id == $currentSection->id && $currentContent->id == $content->id ? 'active' : '' }} px-4 py-2 border">
                                                    <h3 class="font-semibold text-sm">{{ $content->name }}</h3>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <hr class="border-neutral-light" />
                    @endforeach
                </nav>
            </div>

        </aside>

        <!-- Main content area -->
        <div class="main-content flex-grow overflow-y-auto ml-0 md:ml-30 pb-24">
            <main class="px-5 py-6 md:px-8 lg:px-16 lg:py-8 max-w-4xl mx-auto">
                <article class="course-content">
                    <h1 class="text-2xl md:text-3xl">{{ $currentContent->name }}</h1>

                    <div class="flex items-center gap-3 mb-6 text-sm text-neutral-dark">
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-1 text-brand-primary"></i>
                            <span>25 min read</span>
                        </div>
                        <span>•</span>
                        <div class="flex items-center">
                            <i class="fas fa-signal mr-1 text-brand-primary"></i>
                            <span>Intermediate</span>
                        </div>
                        <span>•</span>
                        <div class="flex items-center">
                            <i class="fas fa-gamepad mr-1 text-brand-primary"></i>
                            <span>Valorant</span>
                        </div>
                    </div>

                    {!! $currentContent->content !!}

                </article>
            </main>

            <!-- Fixed navigation footer -->
            <div
                class="navigation-footer fixed bottom-0 left-64 md:left-72 right-0 z-10 bg-white shadow-lg border-t border-neutral-light">
                <div
                    class="max-w-4xl mx-auto px-4 md:px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-3">
                    <p class="text-neutral-dark text-xs md:text-sm text-center md:text-left">Study the material carefully.
                        If you have questions, don't hesitate to ask your coach.</p>
                    <div class="flex items-center gap-3">
                        <a href="#"
                            class="px-4 py-2 rounded-full border border-neutral-light hover:border-brand-primary font-medium transition-all duration-300 text-sm whitespace-nowrap">
                            <i class="fas fa-comment-dots mr-1 md:mr-2"></i>
                            <span>Ask Coach</span>
                        </a>

                        @if (!$isFinished)
                            <a href="{{ route('dashboard.course.learning', [
                                'course' => $course->slug,
                                'courseSection' => $nextContent->course_section_id,
                                'sectionContent' => $nextContent->id,
                                        ]) }}"
                                class="px-4 py-2 rounded-full bg-brand-primary text-white font-medium hover:shadow-lg transition-all duration-300 text-sm whitespace-nowrap">
                                <span>Next Lesson</span>
                                <i class="fas fa-arrow-right ml-1 md:ml-2"></i>
                            </a>
                        @else
                            <a href="{{ route('dashboard.course.learning.finished', $course->slug) }}"
                                class="px-4 py-2 rounded-full bg-brand-primary text-white font-medium hover:shadow-lg transition-all duration-300 text-sm whitespace-nowrap">
                                <span>Finished Learning Lesson</span>
                                <i class="fas fa-arrow-right ml-1 md:ml-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    <script>
        // Toggle sidebar on mobile
        $(document).ready(function() {
            // Mobile sidebar toggle
            $('#sidebar-toggle').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

            // Close sidebar when clicking outside on mobile
            $(document).on('click touchstart', function(e) {
                if ($(window).width() < 768) {
                    if (!$(e.target).closest('#sidebar, #sidebar-toggle').length) {
                        $('#sidebar').removeClass('active');
                    }
                }
            });

            // Reading progress indicator
            $(window).on('scroll', function() {
                const scrollTop = $(window).scrollTop();
                const docHeight = $(document).height() - $(window).height();
                const scrollPercent = (scrollTop / docHeight) * 100;
                $('#reading-progress').css('width', scrollPercent + '%');
            });
        });
    </script>
@endpush
