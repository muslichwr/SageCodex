<?php

namespace App\Providers;

use App\Models\Transaction;
use App\Observers\TranscationObserver;
use App\Repository\PricingRepository;
use App\Repository\PricingRepositoryInterface;
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
