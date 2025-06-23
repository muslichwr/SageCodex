<a href="{{ route('dashboard.course.details', $course->slug) }}"
class="course-card hover-scale hover:shadow-lg transition-all duration-300" data-game="lol"
data-skill="advanced">
<div
    class="flex flex-col rounded-xl border border-neutral-light dark:border-neutral-dark bg-white dark:bg-neutral-dark overflow-hidden">
    <div class="p-3">
        <div
            class="relative w-full aspect-16-9 rounded-xl overflow-hidden bg-neutral-light dark:bg-neutral-darker">
            <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover"
                alt="Course thumbnail">
            <div
                class="absolute top-3 right-3 flex flex-col items-center bg-white dark:bg-neutral-dark rounded-lg py-1 px-2 shadow-md">
                <i class="fas fa-star text-yellow-400"></i>
                <span class="font-semibold text-xs">4.9</span>
            </div>
        </div>
    </div>
    <div class="flex flex-col p-4 pt-1 gap-3">
        <h3 class="font-bold text-lg line-clamp-2">{{ $course->name }}</h3>
        <p class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
            <i class="fas fa-gamepad text-esports-lol-primary"></i>
            <span class="text-sm">{{ $course->category->name }}</span>
        </p>
        <p class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
            <i class="fas fa-book text-brand-primary"></i>
            <span class="text-sm">{{ $course->content_count }} Lessons</span>
        </p>
        {{-- <p class="flex items-center gap-2 text-neutral-dark dark:text-neutral-light">
            <i class="fas fa-signal text-brand-primary"></i>
            <span class="text-sm">Advanced Level</span>
        </p> --}}
    </div>
</div>
</a>