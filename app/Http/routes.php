<?php

get('test', function() {

    $admin = [
        'email' => env('MAIL_FROM_ADDRESS')
    ];

    $admin = (object) $admin;

    dd($admin->email);

});

Route::bind('category', function($category) {
	return App\Category::with('menus')->whereSlug($category)->firstOrFail();
});

Route::bind('menu', function($menu) {
	return App\Menu::with('categories')->whereSlug($menu)->firstOrFail();
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('/menus', ['as' => 'menus', 'uses' => 'PagesController@menus']);
Route::get('/menu/{category}', ['as' => 'menusByCategory', 'uses' => 'PagesController@menusByCategory']);
Route::get('/menu/details/{menu}', ['as' => 'menu', 'uses' => 'PagesController@menu']);

Route::get('/stores', ['as' => 'stores', 'uses' => 'PagesController@stores']);

Route::get('/about-us', ['as' => 'about', 'uses' => 'PagesController@about']);
Route::get('/contact-us', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('/contact-us', 'PagesController@submitContact');


/*=== AUTHENTICATION ===*/
Route::get('auth/login', 'AuthController@getLogin');
Route::post('auth/login', 'AuthController@postLogin');
Route::get('auth/logout', 'AuthController@getLogout');

Route::get('auth/register', 'AuthController@getRegister');
Route::post('auth/register', 'AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*=== ADMIN ROUTES ===*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::bind('categories', function($categories) {
		return App\Category::with('menus')->findOrFail($categories);
	});

	Route::bind('menus', function($menus) {
		return App\Menu::with('categories')->findOrFail($menus);
	});	

	Route::bind('stores', function($stores) {
		return App\Store::with('photos')->findOrFail($stores);
	});		

	Route::bind('slides', function($slides) {
		return App\Slide::with('photos')->findOrFail($slides);
	});		
	
	Route::get('/', ['as' => 'admin', 'uses' => 'Admin\AdminController@home']);

	Route::put('categories/photos/upload', [
				'as' => 'admin.categories.photos.upload', 
				'uses' => 'Admin\PhotosController@uploadCategoryPhoto'
			]);
	
	Route::put('menus/photos/upload', [
				'as' => 'admin.menus.photos.upload', 
				'uses' => 'Admin\PhotosController@uploadMenuPhoto'
			]);


	Route::put('slides/photos/upload', [
				'as' => 'admin.slides.photos.upload', 
				'uses' => 'Admin\PhotosController@uploadSlidePhoto'
			]);

	Route::put('stores/photos/upload', [
				'as' => 'admin.stores.photos.upload', 
				'uses' => 'Admin\PhotosController@uploadStorePhoto'
			]);	

	Route::resource('categories', 'Admin\CategoriesController');				

	Route::resource('menus', 'Admin\MenusController');

	Route::resource('stores', 'Admin\StoresController');

	Route::resource('slides', 'Admin\SlidesController');

});
