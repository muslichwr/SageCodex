@extends('front.layouts.app')
@section('title', 'Course Learning - SageCodex')
@section('content')
    <div class="relative min-h-screen flex justify-center items-center py-10 px-4">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://picsum.photos/id/130/1920/1080" class="w-full h-full object-cover" alt="Gaming Victory Background">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-purple-900/90 to-blue-900/90"></div>
        </div>
        
        <!-- Particles Effect -->
        <div class="particles" id="particles"></div>
        
        <!-- Content Card -->
        <div class="relative z-10 w-full max-w-2xl">
            <!-- Course Completed Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-700 backdrop-blur-md">
                <!-- Card Header with Trophy -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-center">
                    <div class="rounded-full bg-yellow-500/10 p-4 pulse-animation">
                        <i class="fas fa-trophy text-5xl text-yellow-400 trophy-glow"></i>
                    </div>
                </div>
                
                <!-- Progress Bar -->
                <div class="h-1 w-full bg-gray-200 dark:bg-gray-700">
                    <div class="h-1 bg-gradient-to-r from-green-500 to-blue-500 progress-animation"></div>
                </div>
                
                <!-- Card Body -->
                <div class="p-8 text-center">
                    <h1 class="font-['Orbitron'] font-bold text-3xl mb-2 text-gray-900 dark:text-white bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-blue-500">SKILLS LEVELED UP!</h1>
                    <p class="text-gray-600 dark:text-gray-300 mb-8">You've completed the course material successfully and are now ready to apply these skills in competitive gameplay.</p>
                    
                    <!-- Achievement Badges -->
                    <div class="grid grid-cols-3 gap-4 mb-8">
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                            <div class="text-green-500">
                                <i class="fas fa-check-circle text-xl"></i>
                            </div>
                            <div class="text-2xl font-bold mt-1">100%</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Completion</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                            <div class="text-blue-500">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div class="text-2xl font-bold mt-1">24h</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Training Time</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3 relative">
                            <div class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-6 w-6 flex items-center justify-center floating-badge">
                                <span>NEW</span>
                            </div>
                            <div class="text-yellow-500">
                                <i class="fas fa-star text-xl"></i>
                            </div>
                            <div class="text-2xl font-bold mt-1">Pro</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Rank Achieved</div>
                        </div>
                    </div>
                    
                    <!-- Course Info Card -->
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-xl p-4 flex flex-col md:flex-row gap-4 mb-8 hover:shadow-md transition-shadow duration-300 border border-gray-200 dark:border-gray-600">
                        <div class="md:w-1/3 w-full relative">
                            <div class="rounded-lg overflow-hidden aspect-16-9 relative">
                                <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover" alt="Course Preview">
                                <div class="absolute top-0 left-0 m-2 bg-yellow-500 text-xs text-white px-2 py-1 rounded">{{ $course->category->name }}</div>
                            </div>
                        </div>
                        <div class="md:w-2/3 w-full flex flex-col justify-center text-left">
                            <h2 class="font-bold text-xl mb-2 text-gray-800 dark:text-white">{{ $course->name }}</h2>
                            <div class="flex items-center gap-2 mb-1">
                                <i class="fas fa-gamepad text-yellow-500"></i>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $course->category->name }}</p>
                            </div>
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-layer-group text-blue-500"></i>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $course->content_count }} Lessons Completed</p>
                            </div>
                            
                            {{-- <!-- Skills Gained -->
                            <div class="flex flex-wrap gap-2">
                                <span class="skill-badge skill-badge-pro">Reflexes</span>
                                <span class="skill-badge skill-badge-pro">Map Awareness</span>
                                <span class="skill-badge skill-badge-pro">Team Strategy</span>
                            </div> --}}
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="#" class="py-3 px-6 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-full transition-colors text-center font-medium text-gray-800 dark:text-white">
                            <i class="fas fa-certificate mr-2"></i>Get Certificate
                        </a>
                        <a href="{{ route ('dashboard') }}" class="py-3 px-6 bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 rounded-full transition-colors text-center font-medium text-white">
                            <i class="fas fa-th-list mr-2"></i>Explore More Courses
                        </a>
                    </div>
                </div>
                
                <!-- Card Footer -->
                <div class="px-8 pb-8 pt-2 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Ready for the next challenge? <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Join a tournament</a></p>
                </div>
            </div>
            
            {{-- <!-- Quick Links -->
            <div class="mt-6 flex justify-center gap-4">
                <a href="index.html" class="text-white/80 hover:text-white transition-colors">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="profile.html" class="text-white/80 hover:text-white transition-colors">
                    <i class="fas fa-user mr-2"></i>Profile
                </a>
                <a href="#" class="text-white/80 hover:text-white transition-colors" data-theme-toggle aria-label="Toggle dark mode">
                    <span data-icon="moon"><i class="fas fa-moon mr-2"></i>Dark Mode</span>
                    <span data-icon="sun" class="hidden"><i class="fas fa-sun mr-2"></i>Light Mode</span>
                </a>
            </div> --}}
        </div>
    </div>
@endsection
@push('after-scripts')

@endpush