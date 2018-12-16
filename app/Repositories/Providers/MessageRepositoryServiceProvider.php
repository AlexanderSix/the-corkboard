<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 1:37 PM
 */

namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class MessageRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(
            'App\Repositories\Contracts\MessageRepositoryInterface',
            // To change the data source, replace this class name
            // with another implementation
            'App\Repositories\MessageRepository'
        );
    }
}
