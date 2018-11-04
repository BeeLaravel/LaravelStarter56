<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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

        $this->mapAdminRoutes();
        $this->mapBackRoutes();
        $this->mapOfficeRoutes();

        $this->mapFrontRoutes();
        $this->mapWapRoutes();
        $this->mapMobileRoutes();
        $this->mapPhoneRoutes();
        $this->mapTaskRoutes();
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

    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
             ->middleware('web')
             ->namespace($this->namespace.'\Admin')
             ->group(base_path('routes/admin.php'));
    }

    protected function mapBackRoutes()
    {
        Route::prefix('back')
             ->middleware('web')
             ->namespace($this->namespace.'\Back')
             ->group(base_path('routes/back.php'));
    }

    protected function mapOfficeRoutes()
    {
        Route::prefix('office')
             ->middleware('web')
             ->namespace($this->namespace.'\Office')
             ->group(base_path('routes/office.php'));
    }

    protected function mapFrontRoutes()
    {
        Route::prefix('front')
             ->middleware('web')
             ->namespace($this->namespace.'\Front')
             ->group(base_path('routes/front.php'));
    }

    protected function mapWapRoutes()
    {
        Route::prefix('wap')
             ->middleware('web')
             ->namespace($this->namespace.'\Wap')
             ->group(base_path('routes/wap.php'));
    }

    protected function mapMobileRoutes()
    {
        Route::prefix('mobile')
             ->middleware('web')
             ->namespace($this->namespace.'\Mobile')
             ->group(base_path('routes/mobile.php'));
    }

    protected function mapPhoneRoutes()
    {
        Route::prefix('phone')
             ->middleware('web')
             ->namespace($this->namespace.'\Phone')
             ->group(base_path('routes/phone.php'));
    }
    protected function mapTaskRoutes()
    {
        Route::prefix('task')
             ->middleware('web')
             ->namespace($this->namespace.'\Task')
             ->group(base_path('routes/task.php'));
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
    }
}
