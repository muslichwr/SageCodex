<nav class="border-b border-neutral-light dark:border-neutral-dark">
    <div class="flex w-full max-w-7xl px-4 py-5 items-center justify-between mx-auto">
        <div class="flex items-center gap-8">
            <a href="{{ route('front.index') }}" class="flex items-center">
                <span class="font-bold text-2xl gaming-gradient bg-clip-text text-transparent">SAGE<span class="text-brand-accent">CODEX</span></span>
            </a>
            <form method="GET" action="{{ route('dashboard.search.courses') }}" class="relative hidden md:block">
                <div class="flex items-center">
                    <input type="text" name="search" id="" class="form-input pl-10 pr-4 py-2 w-80 rounded-full" placeholder="Search for courses, coaches, or games">
                    <i class="fas fa-search absolute left-3 text-neutral-dark dark:text-neutral-light"></i>
                </div>
            </form>
        </div>

        <div class="flex items-center gap-5">
            <a href="#" class="nav-link hidden sm:flex">
                <i class="fas fa-envelope text-xl"></i>
            </a>
            <a href="course-catalog.html" class="nav-link hidden sm:flex">
                <i class="fas fa-th text-xl"></i>
            </a>
            <a href="#" class="nav-link hidden sm:flex">
                <i class="fas fa-bell text-xl"></i>
            </a>
            <div class="border-l h-8 border-neutral-light dark:border-neutral-dark hidden sm:block"></div>
            <div id="profile-dropdown" class="relative flex items-center gap-3">
                <div class="w-10 h-10 rounded-full overflow-hidden bg-neutral-light dark:bg-neutral-dark">
                    <img src="{{ Storage::url($user->photo) }}" class="w-full h-full object-cover" alt="Profile picture">
                </div>
                <div class="hidden sm:block">
                    <p class="font-semibold">{{ $user->name }}</p>
                    <p class="text-sm text-neutral-dark dark:text-neutral-light">{{ $user->occupation }}</p>
                </div>
                <button id="dropdown-opener" class="flex items-center justify-center">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div id="dropdown" class="absolute top-full right-0 mt-2 w-48 bg-white dark:bg-neutral-dark rounded-xl border border-neutral-light dark:border-neutral-darker py-4 px-5 shadow-lg z-10 hidden">
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('dashboard') }}" class="nav-link">My Courses</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">Coaching Sessions</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.subscriptions') }}" class="nav-link">Subscriptions</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">Settings</a>
                        </li>
                        <li class="border-t border-neutral-light dark:border-neutral-darker pt-2">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Logout') }}
                            </a>
                            </form>                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>