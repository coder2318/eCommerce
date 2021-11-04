<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['get.menu', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
        Route::get('/', \App\Http\Livewire\HomeComponent::class)->name('home');
        Route::get('/about-us', \App\Http\Livewire\AboutUsComponent::class)->name('aboutus');
        Route::get('/contact-us', \App\Http\Livewire\ContactUsComponent::class)->name('contactus');
        Route::get('/shop/{category_slug?}', \App\Http\Livewire\ShopComponent::class)->name('shop');
        Route::get('/cart', \App\Http\Livewire\CartComponent::class)->name('cart')->middleware('auth');
        Route::get('/product/detail/{slug?}', \App\Http\Livewire\DetailComponent::class)->name('product.detail');
        Route::get('/checkout/{order_id?}', \App\Http\Livewire\CheckoutComponent::class)->name('checkout');
        Route::get('/thank-you/{order_id}', \App\Http\Livewire\ThankyouComponent::class)->name('thankyou');
        Route::get('/order-details/{order_id}', \App\Http\Livewire\OrderDetailsComponent::class)->name('order.details');
        Route::get('/reviews/{order_details_id}', \App\Http\Livewire\ReviewComponent::class)->name('reviews');
        Route::get('/my-orders', \App\Http\Livewire\MyOrdersComponent::class)->name('myorders');

    Auth::routes();

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/', function () {           return view('dashboard.homepage'); })->name('admin.dashboard');
        Route::resource('product', 'App\Http\Controllers\ProductController');
        Route::resource('users',        'App\Http\Controllers\UsersController');
        Route::resource('roles',        'App\Http\Controllers\RolesController');
        Route::resource('mail',        'App\Http\Controllers\MailController');
        Route::get('/roles/move/move-up',      'App\Http\Controllers\RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'App\Http\Controllers\RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () {
            Route::get('/',             'App\Http\Controllers\MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'App\Http\Controllers\MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'App\Http\Controllers\MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'App\Http\Controllers\MenuElementController@create')->name('menu.create');
            Route::post('/store',       'App\Http\Controllers\MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'App\Http\Controllers\MenuElementController@getParents');
            Route::get('/edit',         'App\Http\Controllers\MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'App\Http\Controllers\MenuElementController@update')->name('menu.update');
            Route::get('/show',         'App\Http\Controllers\MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'App\Http\Controllers\MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () {
            Route::get('/',         'App\Http\Controllers\MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'App\Http\Controllers\MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'App\Http\Controllers\MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'App\Http\Controllers\MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'App\Http\Controllers\MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'App\Http\Controllers\MenuController@delete')->name('menu.menu.delete');
        });
        Route::prefix('media')->group(function () {
            Route::get('/',                 'App\Http\Controllers\MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'App\Http\Controllers\MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'App\Http\Controllers\MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'App\Http\Controllers\MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'App\Http\Controllers\MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'App\Http\Controllers\MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'App\Http\Controllers\MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'App\Http\Controllers\MediaController@file');
            Route::post('/file/delete',     'App\Http\Controllers\MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'App\Http\Controllers\MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'App\Http\Controllers\MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'App\Http\Controllers\MediaController@cropp');
            Route::get('/file/copy',        'App\Http\Controllers\MediaController@fileCopy')->name('media.file.copy');
        });
    });
});
