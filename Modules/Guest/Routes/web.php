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
use Modules\Guest\Http\Controllers\PagesController;
use Modules\Order\Http\Controllers\OrderController;

//Route::group(
//    [
//        'prefix' => LaravelLocalization::setLocale(),
//        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
////        'middleware' => ['removeLang']
//    ],
//    function () {
//        Route::get('/', [PagesController::class, 'homePage'])->name('home.page');
//        Route::get('/services', [PagesController::class, 'services'])->name('services.page');
//        Route::get('/projects', [PagesController::class, 'projects'])->name('projects.page');
//        Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs.page');
//        Route::get('/about-us', [PagesController::class, 'aboutus'])->name('about.page');
//        Route::get('/contact', [PagesController::class, 'contact'])->name('contact.page');
//        Route::get('/{slug}', [PagesController::class, 'show'])->name('taxonomy.show');
//        Route::get('/order/visual-identity', [OrderController::class, 'visual_identity'])->name('order.id');
//        Route::get('/order/photography', [OrderController::class, 'photography'])->name('order.photography');
//
//    });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
        Route::get('/', [PagesController::class, 'homePage'])->name('home.page');
        Route::get('/services', [PagesController::class, 'services'])->name('services.page');
        Route::get('/projects', [PagesController::class, 'projects'])->name('projects.page');
        Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs.page');
        Route::get('/about-us', [PagesController::class, 'aboutus'])->name('about.page');
        Route::get('/contact', [PagesController::class, 'contact'])->name('contact.page');
        Route::get('/{slug}', [PagesController::class, 'show'])->name('taxonomy.show');
        Route::get('/order/visual-identity', [OrderController::class, 'visual_identity'])->name('order.id');
        Route::get('/order/photography', [OrderController::class, 'photography'])->name('order.photography');

    });


Route::prefix('en')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('lang')
    ->group(function () {
        Route::get('/index', [PagesController::class, 'homePage'])->name('en.home.page');
        Route::get('/services', [PagesController::class, 'services'])->name('en.services.page');
        Route::get('/projects', [PagesController::class, 'projects'])->name('en.projects.page');
        Route::get('/blogs', [PagesController::class, 'blogs'])->name('en.blogs.page');
        Route::get('/about-us', [PagesController::class, 'aboutus'])->name('en.about.page');
        Route::get('/contact', [PagesController::class, 'contact'])->name('en.contact.page');
        Route::get('/{slug}', [PagesController::class, 'show'])->name('en.taxonomy.show');
        Route::get('/order/visual-identity', [OrderController::class, 'visual_identity'])->name('en.order.id');
        Route::get('/order/photography', [OrderController::class, 'photography'])->name('en.order.photography');

    });
