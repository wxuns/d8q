<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\SendEmail;

class SEmail extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindMethod(SendEmail::class.'@handle', function ($job, $app) {
            return $job->handle($app->make(SEmail::class));
        });
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
