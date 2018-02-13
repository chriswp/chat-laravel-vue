<?php

namespace Chat\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Chat\Repositories\ChatRepository::class, \Chat\Repositories\ChatRepositoryEloquent::class);
        $this->app->bind(\Chat\Repositories\MensagemRepository::class, \Chat\Repositories\MensagemRepositoryEloquent::class);
        //:end-bindings:
    }
}
