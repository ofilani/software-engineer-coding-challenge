<?php

namespace App\Providers;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\EloquentProductRepository;
use App\Repository\Eloquent\EloquentCategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositoriesBinding();
    }


    public function registerRepositoriesBinding()
    {
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
