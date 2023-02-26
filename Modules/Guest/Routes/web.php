<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Guest\Http\Controllers\PagesController;
use Modules\Order\Http\Controllers\OrderController;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

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

