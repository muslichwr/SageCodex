@extends('front.layouts.app')
@section('title', 'Pricing - SageCodex')
@section('content')
    <x-nav-guest />
    <main class="flex flex-col flex-1 justify-center">
        <!-- Pricing Section -->
        <section id="pricing" class="flex flex-col items-center gap-8 py-16 px-4">
            <div class="flex flex-col items-center gap-4 max-w-2xl w-full">
                <p
                    class="flex items-center gap-2 w-fit rounded-full py-2 px-4 bg-opacity-20 bg-brand-primary dark:bg-opacity-10">
                    <i class="fas fa-gamepad text-neutral-dark"></i>
                    <span class="font-bold text">FLEXIBLE PLANS FOR ALL SKILL LEVELS</span>
                </p>
                <h1 class="font-bold text-4xl md:text-5xl text-center gaming-gradient">Choose Your Gaming Path</h1>
                <p class="text-neutral-dark dark:text-neutral-light text-center text-lg">
                    From beginners to professional players, we have plans designed to take your gaming skills to the next
                    level
                </p>
            </div>

            <!-- Pricing Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8 w-full max-w-6xl mx-auto px-4">
                <!-- First row: Scholarship & Basic Access & Premium Access -->
                <div
                    class="pricing-card flex flex-col h-fit w-full rounded-2xl p-6 border border-neutral-light dark:border-neutral-dark gap-6 bg-white dark:bg-neutral-darkest hover-scale hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 rounded-2xl bg-brand-secondary bg-opacity-10 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-2xl text-brand-secondary"></i>
                        </div>
                        <h2 class="font-bold text-2xl">Scholarship</h2>
                    </div>
                    <div class="price">
                        <p class="font-bold text-3xl">Free</p>
                        <p class="mt-2 text-neutral-dark dark:text-neutral-light opacity-70">Limited access</p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    <div class="flex flex-col gap-4">
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Access to Select Free Courses</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Community Forum Access</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Basic Skill Assessment</span>
                        </p>
                        <p class="flex items-center gap-3 opacity-50">
                            <i class="fas fa-times-circle"></i>
                            <span class="font-medium">Premium Content Access</span>
                        </p>
                        <p class="flex items-center gap-3 opacity-50">
                            <i class="fas fa-times-circle"></i>
                            <span class="font-medium">Coaching Sessions</span>
                        </p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    <a href="#"
                        class="w-full py-3 px-5 rounded-full bg-neutral-light dark:bg-neutral-dark text-center hover:bg-neutral-dark hover:text-white dark:hover:bg-brand-primary transition-all duration-300">
                        <span class="font-semibold">Apply Now</span>
                    </a>
                </div>

                <!-- Basic Access -->
                <div
                    class="pricing-card flex flex-col h-fit w-full rounded-2xl p-6 border border-neutral-light dark:border-neutral-dark gap-6 bg-white dark:bg-neutral-darkest hover-scale hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-blue-400 bg-opacity-10 flex items-center justify-center">
                            <i class="fas fa-gamepad text-2xl text-blue-400"></i>
                        </div>
                        <h2 class="font-bold text-2xl">Basic Access</h2>
                    </div>
                    <div class="price">
                        <p class="font-bold text-3xl">Rp
                            {{ number_format(App\Models\Pricing::find(1)->price, 0, '', '.') }}<span
                                class="text-lg font-normal"> / {{ App\Models\Pricing::find(1)->duration }} months</span></p>
                        <p class="mt-2 text-neutral-dark dark:text-neutral-light opacity-70">Cancel anytime</p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    <div class="flex flex-col gap-4">
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">All Scholarship Benefits</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Beginner Course Library</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Basic Game Replays Analysis</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Progress Tracking</span>
                        </p>
                        <p class="flex items-center gap-3 opacity-50">
                            <i class="fas fa-times-circle"></i>
                            <span class="font-medium">Advanced Courses</span>
                        </p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    @if ($user && App\Models\Pricing::find(1)->isSubscribedByUser($user->id))
                        <a href="#"
                            class="w-full py-3 px-5 rounded-full bg-blue-400 text-center hover:bg-blue-500 transition-all duration-300">
                            <span class="font-semibold">Subscribed</span>
                        </a>
                    @else
                        <a href="{{ route('front.checkout', App\Models\Pricing::find(1)) }}"
                            class="w-full py-3 px-5 rounded-full bg-blue-400 text-center hover:bg-blue-500 transition-all duration-300">
                            <span class="font-semibold">Apply Now</span>
                        </a>
                    @endif
                </div>

                <!-- Premium Access -->
                <div
                    class="pricing-card flex flex-col h-fit w-full rounded-2xl border-2 border-brand-primary dark:border-brand-primary gap-6 bg-white dark:bg-neutral-darkest overflow-hidden shadow-lg hover-scale hover:shadow-xl transition-all duration-300">
                    <p class="popular-badge text-center font-semibold text-white py-2 bg-brand-primary">Most Popular Package
                    </p>
                    <div class="flex flex-col gap-6 p-6 pt-3">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 rounded-2xl bg-brand-primary bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-trophy text-2xl text-brand-accent"></i>
                            </div>
                            <h2 class="font-bold text-2xl">Premium Access</h2>
                        </div>
                        <div class="price">
                            <p class="font-bold text-3xl">Rp
                                {{ number_format(App\Models\Pricing::find(2)->price, 0, '', '.') }}<span
                                    class="text-lg font-normal"> / {{ App\Models\Pricing::find(2)->duration }} months</span>
                            </p>
                            <p class="mt-2 text-neutral-dark dark:text-neutral-light opacity-70">Cancel anytime</p>
                        </div>
                        <hr class="border-neutral-light dark:border-neutral-dark">
                        <div class="flex flex-col gap-4">
                            <p class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="font-medium">All Basic Access Features</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="font-medium">Full Course Library Access</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="font-medium">Advanced Game Analysis</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="font-medium">Performance Dashboard</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="font-medium">Priority Support</span>
                            </p>
                        </div>
                        <hr class="border-neutral-light dark:border-neutral-dark">
                        @if ($user && App\Models\Pricing::find(2)->isSubscribedByUser($user->id))
                            <a href="#"
                                class="w-full py-3 px-5 rounded-full bg-brand-primary text-center hover:bg-brand-primary-dark transition-all duration-300">
                                <span class="font-semibold">Subscribed</span>
                            </a>
                        @else
                            <a href="{{ route('front.checkout', App\Models\Pricing::find(2)) }}"
                                class="w-full py-3 px-5 rounded-full bg-brand-primary text-center hover:bg-brand-primary-dark transition-all duration-300">
                                <span class="font-semibold">Get Premium</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Second row: Ultimate Access & Pro Coaching & Team -->
                <div
                    class="pricing-card flex flex-col h-fit w-full rounded-2xl p-6 border border-neutral-light dark:border-neutral-dark gap-6 bg-white dark:bg-neutral-darkest hover-scale hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-purple-500 bg-opacity-10 flex items-center justify-center">
                            <i class="fas fa-crown text-2xl text-purple-500"></i>
                        </div>
                        <h2 class="font-bold text-2xl">Ultimate Access</h2>
                    </div>
                    <div class="price">
                        <p class="font-bold text-3xl">Rp
                            {{ number_format(App\Models\Pricing::find(3)->price, 0, '', '.') }}<span
                                class="text-lg font-normal"> / {{ App\Models\Pricing::find(3)->duration }} months</span>
                        </p>
                        <p class="mt-2 text-neutral-dark dark:text-neutral-light opacity-70">Cancel anytime</p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    <div class="flex flex-col gap-4">
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">All Premium Features</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Exclusive Master Classes</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Monthly Group Coaching</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Pro Player VOD Reviews</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Early Access to New Content</span>
                        </p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    @if ($user && App\Models\Pricing::find(3)->isSubscribedByUser($user->id))
                        <a href="#"
                            class="w-full py-3 px-5 rounded-full bg-purple-500 text-center hover:bg-purple-600 transition-all duration-300">>
                            <span class="font-semibold">Subscribed</span>
                        </a>
                    @else
                        <a href="{{ route('front.checkout', App\Models\Pricing::find(3)) }}"
                            class="w-full py-3 px-5 rounded-full bg-purple-500 text-center hover:bg-purple-600 transition-all duration-300">
                            <span class="font-semibold">Go Ultimate</span>
                        </a>
                    @endif
                </div>

                <!-- Pro Coaching -->
                <div
                    class="pricing-card flex flex-col h-fit w-full rounded-2xl p-6 border border-neutral-light dark:border-neutral-dark gap-6 bg-white dark:bg-neutral-darkest hover-scale hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-amber-500 bg-opacity-10 flex items-center justify-center">
                            <i class="fas fa-headset text-2xl text-amber-500"></i>
                        </div>
                        <h2 class="font-bold text-2xl">Pro Coaching</h2>
                    </div>
                    <div class="price">
                        <p class="font-bold text-3xl">Rp
                            {{ number_format(App\Models\Pricing::find(4)->price, 0, '', '.') }}<span
                                class="text-lg font-normal"> / {{ App\Models\Pricing::find(4)->duration }} months</span>
                        </p>
                        <p class="mt-2 text-neutral-dark dark:text-neutral-light opacity-70">Cancel anytime</p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    <div class="flex flex-col gap-4">
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">All Ultimate Features</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Weekly 1-on-1 Coaching</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Personalized Training Plan</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Direct Pro Player Mentoring</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Tournament Preparation</span>
                        </p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    @if ($user && App\Models\Pricing::find(4)->isSubscribedByUser($user->id))
                        <a href="#"
                            class="w-full py-3 px-5 rounded-full bg-esports-lol-primary text-center hover:bg-esports-lol-primary-dark transition-all duration-300">
                            <span class="font-semibold">Subscribed</span>
                        </a>
                    @else
                        <a href="{{ route('front.checkout', App\Models\Pricing::find(4)) }}"
                            class="w-full py-3 px-5 rounded-full bg-esports-lol-primary text-center hover:bg-esports-lol-primary-dark transition-all duration-300">
                            <span class="font-semibold">Start Coaching</span>
                        </a>
                    @endif
                </div>

                <!-- Team Tier -->
                <div
                    class="pricing-card flex flex-col h-fit w-full rounded-2xl p-6 border border-neutral-light dark:border-neutral-dark gap-6 bg-white dark:bg-neutral-darkest hover-scale hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-brand-accent bg-opacity-10 flex items-center justify-center">
                            <i class="fas fa-users text-2xl text-brand-accent"></i>
                        </div>
                        <h2 class="font-bold text-2xl">Team</h2>
                    </div>
                    <div class="price">
                        <p class="font-bold text-xl">Custom pricing for esports teams and organizations</p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    <div class="flex flex-col gap-4">
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Customized Training Programs</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Team Analysis & Strategy</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Dedicated Team Coach</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Scrim Organization</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="font-medium">Competition Preparation</span>
                        </p>
                    </div>
                    <hr class="border-neutral-light dark:border-neutral-dark">
                    <a href="#"
                        class="w-full py-3 px-5 rounded-full bg-white dark:bg-neutral-darkest text-center border border-neutral-light dark:border-neutral-dark hover:border-brand-accent dark:hover:border-brand-accent transition-all duration-300">
                        <span class="font-semibold">Contact Us</span>
                    </a>
                </div>
            </div>

            <!-- Pricing Comparison -->
            <div class="w-full max-w-6xl mx-auto mt-16 px-4 overflow-x-auto">
                <div class="mb-8 text-center">
                    <h3 class="text-2xl font-bold">Compare All Features</h3>
                    <p class="text-neutral-dark dark:text-neutral-light mt-2">Swipe horizontally on mobile to see all
                        features</p>
                </div>
                <table class="min-w-full border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                    <thead class="bg-neutral-light dark:bg-neutral-dark">
                        <tr>
                            <th class="px-6 py-4 text-left">Feature</th>
                            <th class="px-4 py-4 text-center">Scholarship</th>
                            <th class="px-4 py-4 text-center">Basic</th>
                            <th class="px-4 py-4 text-center">Premium</th>
                            <th class="px-4 py-4 text-center">Ultimate</th>
                            <th class="px-4 py-4 text-center">Pro Coaching</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-darkest divide-y divide-neutral-light dark:divide-neutral-dark">
                        <tr>
                            <td class="px-6 py-4 font-medium">Access to Courses</td>
                            <td class="px-4 py-4 text-center">Limited</td>
                            <td class="px-4 py-4 text-center">Beginner</td>
                            <td class="px-4 py-4 text-center">Full Library</td>
                            <td class="px-4 py-4 text-center">Full + Exclusive</td>
                            <td class="px-4 py-4 text-center">All Content</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Game Analysis</td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center">Basic</td>
                            <td class="px-4 py-4 text-center">Advanced</td>
                            <td class="px-4 py-4 text-center">Pro Level</td>
                            <td class="px-4 py-4 text-center">Custom</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Coaching Sessions</td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center">Monthly Group</td>
                            <td class="px-4 py-4 text-center">Weekly 1-on-1</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Performance Analytics</td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center">Basic</td>
                            <td class="px-4 py-4 text-center">Advanced</td>
                            <td class="px-4 py-4 text-center">Pro</td>
                            <td class="px-4 py-4 text-center">Custom</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Community Access</td>
                            <td class="px-4 py-4 text-center">Read Only</td>
                            <td class="px-4 py-4 text-center">Basic</td>
                            <td class="px-4 py-4 text-center">Full</td>
                            <td class="px-4 py-4 text-center">Premium</td>
                            <td class="px-4 py-4 text-center">VIP</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Tournament Prep</td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center">Group</td>
                            <td class="px-4 py-4 text-center">Personalized</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Pro Player Contact</td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center"><i class="fas fa-times text-red-400"></i></td>
                            <td class="px-4 py-4 text-center">Limited</td>
                            <td class="px-4 py-4 text-center">Direct</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Price</td>
                            <td class="px-4 py-4 text-center font-bold">Free</td>
                            <td class="px-4 py-4 text-center font-bold">Rp
                                {{ number_format(App\Models\Pricing::find(1)->price, 0, '', '.') }} /
                                {{ App\Models\Pricing::find(1)->duration }} months</td>
                            <td class="px-4 py-4 text-center font-bold">Rp
                                {{ number_format(App\Models\Pricing::find(2)->price, 0, '', '.') }} /
                                {{ App\Models\Pricing::find(2)->duration }} months</td>
                            <td class="px-4 py-4 text-center font-bold">Rp
                                {{ number_format(App\Models\Pricing::find(3)->price, 0, '', '.') }} /
                                {{ App\Models\Pricing::find(3)->duration }} months</td>
                            <td class="px-4 py-4 text-center font-bold">Rp
                                {{ number_format(App\Models\Pricing::find(4)->price, 0, '', '.') }} /
                                {{ App\Models\Pricing::find(4)->duration }} months</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-16 w-full bg-neutral-lightest dark:bg-neutral-darker">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex flex-col items-center gap-8 mb-12">
                    <h2 class="font-bold text-3xl gaming-gradient">What Our Gamers Say</h2>
                    <p class="text-center max-w-xl">Hear from our community of passionate gamers who have leveled up their
                        skills with SageCodex</p>
                </div>

                <div id="testimonial-slider" class="w-full flex flex-nowrap overflow-x-hidden">
                    <div class="slider-container flex gap-6 flex-nowrap animate-[slide_50s_linear_infinite]">
                        <!-- Testimonial Cards -->
                        <!-- 1 -->
                        <div
                            class="testimonial-card flex flex-col w-80 shrink-0 rounded-2xl border border-neutral-light dark:border-neutral-dark p-6 gap-4 bg-white dark:bg-neutral-darkest">
                            <div class="flex">
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                            </div>
                            <p class="leading-relaxed">SageCodex took my Valorant skills to the next level. The pro tips
                                and personalized coaching helped me climb from Silver to Diamond in just two months!</p>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-neutral-light dark:bg-neutral-dark">
                                    <img src="https://picsum.photos/seed/gamer1/200" class="w-full h-full object-cover"
                                        alt="Gamer profile">
                                </div>
                                <div>
                                    <p class="font-semibold">Alex Richards</p>
                                    <p class="text-sm text-neutral-dark dark:text-neutral-light opacity-70">Valorant Player
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 2 -->
                        <div
                            class="testimonial-card flex flex-col w-80 shrink-0 rounded-2xl border border-neutral-light dark:border-neutral-dark p-6 gap-4 bg-white dark:bg-neutral-darkest">
                            <div class="flex">
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                            </div>
                            <p class="leading-relaxed">The League of Legends coaching on SageCodex is mind-blowing. My map
                                awareness and team fight positioning improved dramatically after just a few sessions.</p>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-neutral-light dark:bg-neutral-dark">
                                    <img src="https://picsum.photos/seed/gamer2/200" class="w-full h-full object-cover"
                                        alt="Gamer profile">
                                </div>
                                <div>
                                    <p class="font-semibold">Sarah Kim</p>
                                    <p class="text-sm text-neutral-dark dark:text-neutral-light opacity-70">LoL Player</p>
                                </div>
                            </div>
                        </div>

                        <!-- 3 -->
                        <div
                            class="testimonial-card flex flex-col w-80 shrink-0 rounded-2xl border border-neutral-light dark:border-neutral-dark p-6 gap-4 bg-white dark:bg-neutral-darkest">
                            <div class="flex">
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                            </div>
                            <p class="leading-relaxed">As a CS:GO player, the strategy workshops and utility tutorials were
                                game-changing. Now my team actually listens to my calls!</p>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-neutral-light dark:bg-neutral-dark">
                                    <img src="https://picsum.photos/seed/gamer3/200" class="w-full h-full object-cover"
                                        alt="Gamer profile">
                                </div>
                                <div>
                                    <p class="font-semibold">Mike Johnson</p>
                                    <p class="text-sm text-neutral-dark dark:text-neutral-light opacity-70">CS:GO Player
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 4 -->
                        <div
                            class="testimonial-card flex flex-col w-80 shrink-0 rounded-2xl border border-neutral-light dark:border-neutral-dark p-6 gap-4 bg-white dark:bg-neutral-darkest">
                            <div class="flex">
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                            </div>
                            <p class="leading-relaxed">The Dota 2 courses on SageCodex are exceptional. The pro coaches
                                break down complex mechanics in a way that's easy to understand and implement.</p>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-neutral-light dark:bg-neutral-dark">
                                    <img src="https://picsum.photos/seed/gamer4/200" class="w-full h-full object-cover"
                                        alt="Gamer profile">
                                </div>
                                <div>
                                    <p class="font-semibold">Elena Torres</p>
                                    <p class="text-sm text-neutral-dark dark:text-neutral-light opacity-70">Dota 2 Player
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 5 -->
                        <div
                            class="testimonial-card flex flex-col w-80 shrink-0 rounded-2xl border border-neutral-light dark:border-neutral-dark p-6 gap-4 bg-white dark:bg-neutral-darkest">
                            <div class="flex">
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                                <i class="fas fa-star text-brand-accent"></i>
                            </div>
                            <p class="leading-relaxed">Worth every penny! The analytics tools helped me identify weaknesses
                                in my gameplay I never noticed before. Now I'm consistently performing better in
                                tournaments.</p>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-neutral-light dark:bg-neutral-dark">
                                    <img src="https://picsum.photos/seed/gamer5/200" class="w-full h-full object-cover"
                                        alt="Gamer profile">
                                </div>
                                <div>
                                    <p class="font-semibold">James Wilson</p>
                                    <p class="text-sm text-neutral-dark dark:text-neutral-light opacity-70">Fortnite Player
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="py-16 w-full">
            <div class="max-w-4xl mx-auto px-4">
                <div class="flex flex-col items-center gap-8 mb-12">
                    <h2 class="font-bold text-3xl gaming-gradient">Frequently Asked Questions</h2>
                    <p class="text-center max-w-xl">Everything you need to know about our esports training platform</p>
                </div>

                <div class="flex flex-col gap-4" id="faq-container">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                        <button class="faq-button w-full flex justify-between items-center p-5 text-left" data-faq="1">
                            <span class="font-semibold">What are the differences between the subscription tiers?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-answer px-5 pb-5 hidden">
                            <p>Each tier builds on the previous one, adding more features and personalized attention:</p>
                            <ul class="mt-2 ml-6 list-disc">
                                <li class="mb-1"><strong>Scholarship:</strong> Free tier with access to select courses
                                    and community forums.</li>
                                <li class="mb-1"><strong>Basic Access:</strong> Beginner courses, basic game analysis,
                                    and progress tracking.</li>
                                <li class="mb-1"><strong>Premium Access:</strong> Full course library, advanced game
                                    analysis, and performance dashboard.</li>
                                <li class="mb-1"><strong>Ultimate Access:</strong> Exclusive master classes, monthly
                                    group coaching, and pro VOD reviews.</li>
                                <li><strong>Pro Coaching:</strong> Weekly 1-on-1 coaching sessions with personalized
                                    training plans.</li>
                            </ul>
                            <p class="mt-2">Check our comparison table above for a detailed feature breakdown.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                        <button class="faq-button w-full flex justify-between items-center p-5 text-left" data-faq="2">
                            <span class="font-semibold">How does the Scholarship program work?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-answer px-5 pb-5 hidden">
                            <p>Our Scholarship program provides free access to select educational content for gamers who
                                show dedication but may have financial constraints. To apply, fill out our application form
                                detailing your gaming goals, current skill level, and why you're passionate about improving.
                                We review applications monthly and select candidates based on demonstrated enthusiasm and
                                potential.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                        <button class="faq-button w-full flex justify-between items-center p-5 text-left" data-faq="3">
                            <span class="font-semibold">What games do you currently support?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-answer px-5 pb-5 hidden">
                            <p>We currently offer comprehensive coaching and courses for League of Legends, Valorant, CS:GO,
                                Dota 2, and Fortnite. We're constantly expanding our game library based on community
                                feedback. Each game has specialized content tailored to different skill levels, from
                                beginner fundamentals to advanced pro-level strategies.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                        <button class="faq-button w-full flex justify-between items-center p-5 text-left" data-faq="4">
                            <span class="font-semibold">Who are your coaches?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-answer px-5 pb-5 hidden">
                            <p>Our coaching team consists of professional esports players, established content creators, and
                                high-ranked competitive players. Each coach is carefully selected based on both their gaming
                                achievements and teaching abilities. All coaches go through a rigorous vetting process,
                                including demonstration lessons and student feedback evaluation, to ensure they can
                                effectively communicate strategies and help players improve.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="faq-item border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                        <button class="faq-button w-full flex justify-between items-center p-5 text-left" data-faq="5">
                            <span class="font-semibold">Can I upgrade or downgrade my subscription?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-answer px-5 pb-5 hidden">
                            <p>Yes, you can change your subscription tier at any time from your account settings. When
                                upgrading, you'll be charged the prorated difference for the remainder of your billing
                                cycle. When downgrading, your new tier will take effect at the start of your next billing
                                cycle, allowing you to enjoy your current benefits until then.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="faq-item border border-neutral-light dark:border-neutral-dark rounded-xl overflow-hidden">
                        <button class="faq-button w-full flex justify-between items-center p-5 text-left" data-faq="6">
                            <span class="font-semibold">Do you offer team packages?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-answer px-5 pb-5 hidden">
                            <p>Absolutely! We offer customized coaching packages for teams of all skill levels. Our team
                                packages include group sessions, team analysis, strategy development, scrim organization,
                                and dedicated coaching staff. We work with amateur teams, semi-pro organizations, and
                                professional teams looking to refine specific areas of gameplay. Contact us directly for a
                                quote tailored to your team's needs and goals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('after-scripts')
    <script src="{{ asset('js/darkMode.js') }}"></script>
    <script src="{{ asset('js/faq.js') }}"></script>
@endpush
