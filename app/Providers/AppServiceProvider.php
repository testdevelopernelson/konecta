<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;

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
        Blade::directive('hasRole', function ($arguments) {
            $role = $arguments;
            return "<?php if(auth()->guard()->user()->hasRole({$role})): ?>";
        });

        Blade::directive('endHasRole', function () {
            return '<?php endif; ?>';
        });
    }
}
