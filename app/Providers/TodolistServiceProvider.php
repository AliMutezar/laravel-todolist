<?php

namespace App\Providers;

use App\Services\Impl\TodolistServiceImpl;
use App\Services\TodolistService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;


// DeferrableProvider berguna untuk mengimplementasikan service yg hanya dibutuhkan saja
class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{
    // Interface-nya apa untuk mengimplementasi class yang mana
    public array $singletons = [
        TodolistService::class => TodolistServiceImpl::class
    ];

    // Override method provides, isinya service provider untuk data TodolistService::class
    public function provides():array
    {
        return [TodolistService::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
