<?php

namespace App\Providers;

use App\Interfaces\ConversionRepositoryInterface;
use App\Interfaces\MerchantRepositoryInterface;
use App\Interfaces\TransferRepositoryInterface;
use App\Repositories\ConversionRepository;
use App\Repositories\MerchantRepository;
use App\Repositories\TransferRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() 
{
    $this->app->bind(TransferRepositoryInterface::class, TransferRepository::class);
    $this->app->bind(MerchantRepositoryInterface::class, MerchantRepository::class);
 }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
