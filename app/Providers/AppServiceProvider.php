<?php

namespace App\Providers;

use App\Contracts\MessageStore;
use App\Services\MessageStoreDB;
use App\Services\MessageStoreDisk;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        MessageStore::class => MessageStoreDB::class,
//        MessageStore::class => MessageStoreDisk::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
