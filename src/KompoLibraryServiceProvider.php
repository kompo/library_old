<?php 

namespace Kompo\Library;

use Illuminate\Support\ServiceProvider;

class KompoLibraryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {        
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if (file_exists($file = __DIR__.'/helpers.php'))
            require_once $file;
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