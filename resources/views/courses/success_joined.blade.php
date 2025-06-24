@extends('front.layouts.app')
@section('title', 'Success Joined - SageCodex')
@section('content')

<div class="relative min-h-screen flex justify-center items-center py-10 px-4">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://picsum.photos/id/156/1920/1080" class="w-full h-full object-cover" alt="Gaming Setup Background">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-purple-900/90 to-blue-900/90"></div>
    </div>
    
    <!-- Particles Effect -->
    <div class="particles" id="particles"></div>
    
    <!-- Content Card -->
    <div class="relative z-10 w-full max-w-2xl">
        <!-- Success Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-700 backdrop-blur-md">
            <!-- Card Header with Logo -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-center">
                <div class="rounded-full bg-blue-500/10 p-4 pulse-animation">
                    <i class="fas fa-trophy text-5xl text-yellow-400"></i>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="h-1 w-full bg-gray-200 dark:bg-gray-700">
                <div class="h-1 bg-gradient-to-r from-blue-500 to-purple-500 progress-animation"></div>
            </div>
            
            <!-- Card Body -->
            <div class="p-8 text-center">
                <h1 class="font-['Orbitron'] font-bold text-3xl mb-2 text-gray-900 dark:text-white bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-purple-600">WELCOME TO THE ARENA</h1>
                <p class="text-gray-600 dark:text-gray-300 mb-8">You've successfully joined the elite training ground for esports athletes. Prepare to level up your skills with pro-taught courses.</p>
                
                <!-- Stats Section (New) -->
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                        <div class="text-blue-500">
                            <i class="fas fa-graduation-cap text-xl"></i>
                        </div>
                        <div class="text-2xl font-bold mt-1">250+</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Pro Courses</div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                        <div class="text-red-500">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div class="text-2xl font-bold mt-1">50K+</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Students</div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                        <div class="text-yellow-500">
                            <i class="fas fa-star text-xl"></i>
                        </div>
                        <div class="text-2xl font-bold mt-1">4.8</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Avg. Rating</div>
                    </div>
                </div>
                
                <!-- Course Preview -->
                <div class="bg-gray-100 dark:bg-gray-700 rounded-xl p-4 flex flex-col md:flex-row gap-4 mb-8 hover:shadow-md transition-shadow duration-300">
                    <div class="md:w-1/3 w-full relative">
                        <div class="rounded-lg overflow-hidden aspect-16-9 relative">
                            <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover" alt="Course Preview">
                            <div class="absolute top-0 left-0 m-2 bg-red-500 text-xs text-white px-2 py-1 rounded">{{ $course->category->name }}</div>
                            <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                <div class="bg-white/20 rounded-full p-3 backdrop-blur-sm">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 w-full flex flex-col justify-center text-left">
                        <h2 class="font-bold text-xl mb-2 text-gray-800 dark:text-white">{{ $course->name }}</h2>
                        <div class="flex items-center gap-2 mb-1">
                            <i class="fas fa-gamepad text-red-500"></i>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $course->category->name }}</p>
                        </div>
                        <div class="flex items-center gap-2 mb-1">
                            <i class="fas fa-book text-blue-500"></i>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $course->content_count }} Lessons</p>
                        </div>
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-star text-yellow-400"></i>
                            <p class="text-sm text-gray-600 dark:text-gray-400">4.9 Rating (128 reviews)</p>
                        </div>
{{--                         
                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 text-xs px-2 py-1 rounded">Aim</span>
                            <span class="bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 text-xs px-2 py-1 rounded">Reflex</span>
                            <span class="bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 text-xs px-2 py-1 rounded">Strategy</span>
                        </div> --}}
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="course-catalog.html" class="py-3 px-6 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-full transition-colors text-center font-medium text-gray-800 dark:text-white">
                        <i class="fas fa-th mr-2"></i>Browse More Courses
                    </a>
                    <a href="{{ route('dashboard.course.learning', [
                        'course' => $course->slug,
                        'courseSection' => $firstSectionId,
                        'sectionContent' => $firstContentId,
                        ]) }}" class="flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary text-white border border-brand-primary hover:bg-brand-primary-dark transition-colors">
                        <span class="relative z-10"><i class="fas fa-play-circle mr-2"></i>Start Learning</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                    </a>
                </div>
            </div>
            
            <!-- Card Footer -->
            <div class="px-8 pb-8 pt-2 text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">Need help? <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Contact support</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
@push('after-scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
