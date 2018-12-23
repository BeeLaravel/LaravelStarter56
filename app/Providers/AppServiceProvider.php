<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Database\Eloquent\Relations\Relation;
// use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191); // 兼容老版本 MySQL
        view()->composer('admin.layout.menu', 'App\Http\ViewComposers\AdminMenuComposer'); // 视图合成器
        // User::observe(UserObserver::class);

        // Relation::morphMap([ // 多对多多态映射表
        //     'posts' => 'App\Post',
        //     'videos' => 'App\Video',
        // ]);
        // Resource::withoutWrapping();
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
