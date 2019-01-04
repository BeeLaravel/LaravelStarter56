<?php
namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {
    protected $namespace = 'App\Http\Controllers';

    public function boot() {
        parent::boot();
    }

    public function map() {
        $this->mapWebRoutes();

        $this->mapAdminRoutes();
        $this->mapBackRoutes();
        $this->mapBackendRoutes();
        $this->mapOfficeRoutes();

        $this->mapFrontRoutes();
        $this->mapWapRoutes();
        $this->mapMobileRoutes();
        $this->mapPhoneRoutes();
        $this->mapTaskRoutes();

        $this->mapApiRoutes();
    }

    protected function mapAdminRoutes() {
        Route::prefix('admin')
             ->middleware('web')
             ->namespace($this->namespace.'\Admin')
             ->group(base_path('routes/admin.php'));
    }
    protected function mapBackRoutes() {
        Route::prefix('back')
             ->middleware('web')
             ->namespace($this->namespace.'\Back')
             ->group(base_path('routes/back.php'));
    }
    protected function mapBackendRoutes() {
        Route::prefix('backend')
             ->middleware('web')
             ->namespace($this->namespace.'\Backend')
             ->group(base_path('routes/backend.php'));
    }
    protected function mapOfficeRoutes() {
        Route::prefix('office')
             ->middleware('web')
             ->namespace($this->namespace.'\Office')
             ->group(base_path('routes/office.php'));
    }

    protected function mapWebRoutes() {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    protected function mapFrontRoutes() {
        Route::middleware('web')
             ->namespace($this->namespace.'\Front')
             ->group(base_path('routes/front.php'));
    }
    protected function mapWapRoutes() {
        Route::prefix('wap')
             ->middleware('web')
             ->namespace($this->namespace.'\Wap')
             ->group(base_path('routes/wap.php'));
    }
    protected function mapMobileRoutes() {
        Route::prefix('mobile')
             ->middleware('web')
             ->namespace($this->namespace.'\Mobile')
             ->group(base_path('routes/mobile.php'));
    }
    protected function mapPhoneRoutes() {
        Route::prefix('phone')
             ->middleware('web')
             ->namespace($this->namespace.'\Phone')
             ->group(base_path('routes/phone.php'));
    }
    protected function mapTaskRoutes() {
        Route::prefix('task')
             ->middleware('web')
             ->namespace($this->namespace.'\Task')
             ->group(base_path('routes/task.php'));
    }

    protected function mapApiRoutes() {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
