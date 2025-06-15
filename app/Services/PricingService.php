<?php

namespace App\Services;

use App\Models\Pricing;
use App\Repository\PricingRepositoryInterface;

class PricingService
{
    protected $pricingRepository;

    public function __construct(PricingRepositoryInterface $pricingRepository)
    {
        $this->pricingRepository = $pricingRepository;
    }

    public function getAllPackage()
    {
        return $this->pricingRepository->getAll();
    }

    // public function getAllPackage()
    // {
    //     return Pricing::all();
    // }

}