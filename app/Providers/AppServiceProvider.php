<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
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
        if (env('REDIRECT_HTTPS')) {
            \URL::forceScheme('https');
        }

        $polling = \App\Polling::getCurrentActivePolling();
        $pollingData = null;

        if(!empty($polling)){
            $options = [];

            foreach($polling->options as $option)
            {
                $options[] = [
                    'id' => $option->id,
                    'option' => $option->option
                ];
            }

            $pollingData = [
                'id' => $polling->id,
                'question' => $polling->name,
                'options' => $options,
            ];
        }

        View::share('current_polling',$pollingData);
    }
}
