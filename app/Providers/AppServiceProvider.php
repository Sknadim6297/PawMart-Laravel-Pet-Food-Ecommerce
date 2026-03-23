<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register view composer for header counts
        view()->composer('frontend.sections.header', \App\View\Composers\HeaderComposer::class);
        
        // Make Str class available in all Blade views
        Blade::directive('str', function ($expression) {
            return "<?php echo \\Illuminate\\Support\\Str::{$expression}; ?>";
        });
        
        // Share Str class with all views
        view()->share('Str', new class {
            public function __call($method, $args) {
                return Str::$method(...$args);
            }
            
            public static function __callStatic($method, $args) {
                return Str::$method(...$args);
            }
        });
        
        // Share Route facade with all views
        view()->share('Route', RouteFacade::getFacadeRoot());
    }
}
