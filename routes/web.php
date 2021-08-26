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
//    Route::get('/', function () {           return view('dashboard.homepage'); });
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
    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/colors', function () {     return view('dashboard.colors'); });
        Route::get('/typography', function () { return view('dashboard.typography'); });
        Route::get('/charts', function () {     return view('dashboard.charts'); });
        Route::get('/widgets', function () {    return view('dashboard.widgets'); });
        Route::get('/404', function () {        return view('dashboard.404'); });
        Route::get('/500', function () {        return view('dashboard.500'); });
        Route::prefix('base')->group(function () {
            Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
            Route::get('/cards', function(){        return view('dashboard.base.cards'); });
            Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
            Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });

            Route::get('/forms', function(){        return view('dashboard.base.forms'); });
            Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
            Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
            Route::get('/navs', function(){         return view('dashboard.base.navs'); });

            Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
            Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
            Route::get('/progress', function(){     return view('dashboard.base.progress'); });
            Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });

            Route::get('/switches', function(){     return view('dashboard.base.switches'); });
            Route::get('/tables', function () {     return view('dashboard.base.tables'); });
            Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
            Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
        });
        Route::prefix('buttons')->group(function () {
            Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
            Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
            Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
            Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
        });
        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
            Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
            Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
        });
        Route::prefix('notifications')->group(function () {
            Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
            Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
            Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
        });
        Route::resource('notes', 'App\Http\Controllers\NotesController');
    });
    Auth::routes();

    Route::resource('resource/{table}/resource', 'App\Http\Controllers\ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('product', 'App\Http\Controllers\ProductController');
        Route::resource('bread',  'App\Http\Controllers\BreadController');   //create BREAD (resource)
        Route::resource('users',        'App\Http\Controllers\UsersController')->except( ['create', 'store'] );
        Route::resource('roles',        'App\Http\Controllers\RolesController');
        Route::resource('mail',        'App\Http\Controllers\MailController');
        Route::get('prepareSend/{id}',        'App\Http\Controllers\MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',        'App\Http\Controllers\MailController@send')->name('mailSend');
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
