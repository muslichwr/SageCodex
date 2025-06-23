<nav class="border-b border-neutral-light dark:border-neutral-dark">
    <div class="flex w-full max-w-7xl px-4 py-5 items-center justify-between mx-auto">
        <div class="flex items-center gap-8">
            <a href="{{ route('front.index') }}" class="flex items-center">
                <span class="font-bold text-2xl gaming-gradient bg-clip-text text-transparent">SAGE<span class="text-brand-accent">CODEX</span></span>
            </a>
            <ul class="hidden md:flex items-center gap-10">
                <li class="hover:font-semibold transition-all duration-300 font-semibold">
                    <a href="{{ route('front.index') }}" class="nav-link">Home</a>
                </li>
                <li class="hover:font-semibold transition-all duration-300">
                    <a href="{{ route('front.pricing') }}" class="nav-link">Pricing</a>
                </li>
                <li class="hover:font-semibold transition-all duration-300">
                    <a href="#" class="nav-link">Features</a>
                </li>
                <li class="hover:font-semibold transition-all duration-300">
                    <a href="#" class="nav-link">Testimonials</a>
                </li>
            </ul>
        </div>

        <div class="flex items-center gap-5">
            <a href="{{ route('register') }}" class="py-2 px-4 rounded-full border border-neutral-light dark:border-neutral-dark hover:border-brand-primary dark:hover:border-brand-primary transition-colors">
                <span class="font-semibold">Sign Up</span>
            </a>
            <a href="{{ route('login') }}" class="py-2 px-4 rounded-full bg-brand-primary text-white hover:bg-brand-primary-dark transition-colors">
                <span class="font-semibold">Login</span>
            </a>
        </div>
    </div>
</nav>