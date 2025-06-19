<?php

namespace App\Providers;

use App\Models\Transaction;
use App\Observers\TranscationObserver;
use App\Repository\CourseRepository;
use App\Repository\CourseRepositoryInterface;
use App\Repository\PricingRepository;
use App\Repository\PricingRepositoryInterface;
use App\Repository\TransactionRepository;
use App\Repository\TransactionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(PricingRepositoryInterface::class, PricingRepository::class);
        $this->app->singleton(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->singleton(CourseRepositoryInterface::class, CourseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Transaction::observe(TranscationObserver::class);
    }
}
