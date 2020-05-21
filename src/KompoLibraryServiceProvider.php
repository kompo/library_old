<?php 

namespace Kompo\Library;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Middlewares\{RoleMiddleware, PermissionMiddleware, RoleOrPermissionMiddleware};

class KompoLibraryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {        
        $this->loadJSONTranslationsFrom(__DIR__.'/../resources/lang');
        
        $this->mergeConfigFrom(__DIR__.'/../config/services.php', 'services');
        $this->mergeConfigFrom(__DIR__.'/../config/auth.php', 'auth');

        if(count(config('auth.socialites')))
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/socialite');
        
        if(config('auth.permissions_and_roles'))
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/permissions');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if (file_exists($file = __DIR__.'/helpers.php'))
            require_once $file;

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'kompo-library');
        
        \Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
        

        app('router')->aliasMiddleware('role', RoleMiddleware::class);
        app('router')->aliasMiddleware('permission', PermissionMiddleware::class);
        app('router')->aliasMiddleware('role_or_permission', RoleOrPermissionMiddleware::class);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}