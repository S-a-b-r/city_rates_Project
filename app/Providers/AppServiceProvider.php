<?php

namespace App\Providers;

use App\Models\Rate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        //Paginator::useBootstrap();


        //adminBlade
        Blade::directive('author',function ($id){
            return "<?php if(auth()->user()->id == $id): ?>";
        });
        Blade::directive('endauthor',function (){
            return "<?php endif; ?>";
        });

    }
}
