<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {     

        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }
}
