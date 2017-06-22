<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//jeigu segmentas (t.y. po adreso pirmas =odis po slasho, t.y. "admin"), nelygus "admin", lange išmes
        // pashare'intą info.
//        if(request()->segment(1) !== 'admin')
//
//            View::share('_a_', 'Labas');


        require base_path('App/Http/helpers.php');

        if (request()->segment(1) !== 'admin') {
            View::share('menu', getFrontEndMenu());
            View::share('lang', getActiveLanguages());
            View::share('rooms', getVRRooms());

        }
        //jeigu norime į visus blade'us paduoti kažkokį kintamąjį, pvz:
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
