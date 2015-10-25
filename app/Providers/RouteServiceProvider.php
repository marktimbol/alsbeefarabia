<?php

namespace App\Providers;

use App\Category;
use App\Menu;
use App\Slide;
use App\Store;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {

        Route::bind('category', function($category) {
            return Category::with('menus', 'photos')->whereSlug($category)->firstOrFail();
        });

        Route::bind('menu', function($menu) {
            return Menu::with('categories', 'photos')->whereSlug($menu)->firstOrFail();
        });

        Route::bind('categories', function($categories) {
            return Category::with('menus', 'photos')->findOrFail($categories);
        });

        Route::bind('menus', function($menus) {
            return Menu::with('categories', 'photos')->findOrFail($menus);
        }); 

        Route::bind('stores', function($stores) {
            return Store::with('photos')->findOrFail($stores);
        });     

        Route::bind('slides', function($slides) {
            return Slide::with('photos')->findOrFail($slides);
        }); 

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
