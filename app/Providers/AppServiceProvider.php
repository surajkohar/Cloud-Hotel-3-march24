<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use ProtoneMedia\Splade\Components\Form\Input;
use ProtoneMedia\Splade\SpladeTable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Input::defaultDateFormat('d-m-Y');
        SpladeTable::hidePaginationWhenResourceContainsOnePage();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
