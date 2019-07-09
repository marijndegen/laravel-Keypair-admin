<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Response;
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
        \Response::macro('attachment', function ($content, $filename) {

            $headers = [
                'Content-Disposition' => "attachment; filename={$filename}",
            ];
        
            return \Response::make($content, 200, $headers);
        
        });
    }
}
