<?php

namespace App\Providers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Mockery\Exception;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //


        parent::boot();
//       dd(Route::getFacadeRoot());

//        dd( \Request::getPathInfo());

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {


        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {

        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));


        $explod = explode('/', \Request::getPathInfo());
        //dd($explod);
        $dirs = glob(base_path('routes/*'), GLOB_ONLYDIR);
        $files_name=[];

        try {

            if ($explod[1] == "api") {
                $files_name = getAllFileDirectory(base_path('routes/' . $explod[2] . "/" . $explod[3]));

                for ($i = 0; $i < sizeof($files_name); $i++) {
                    Route::prefix('api')
                        ->middleware('api')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/' . $explod[2] . "/" . $explod[3] . '/' . $files_name[$i]));
                }
            }
        } catch (Exception $exception) {
        }


//         foreach ($dirs as $dir) {
//
//            $dir= substr(strrchr(rtrim($dir, '/'), '/'), 1);
//
//
//            Route::prefix('api')
//                ->middleware('api')
//                ->namespace($this->namespace)
//                ->group(base_path('routes/'.$dir.'/api.php'));
//
//        }


    }


}
