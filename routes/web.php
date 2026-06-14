<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

Route::get('/' , [SmartController::class , 'home'])->name('home');
Route::get('/about' , [SmartController::class , 'about'])->name('about');
Route::get('/salons/{slug?}', [SmartController::class, 'salons'])->name('salons');
Route::get('/gallery' , [SmartController::class , 'gallery'])->name('gallery');
Route::get('/contact' , [SmartController::class , 'contact'])->name('contact');
Route::get('/post/{slug}', [SmartController::class, 'show'])->name('post.show');
Route::post('/store' , [SmartController::class , 'store'])->name('store');


Route::get('/agence-evenementielle-casablanca', fn() => view('Pages.agence-evenementielle-casablanca'))->name('agence.casablanca');

Route::get('/terms-of-use', [SmartController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [SmartController::class, 'privacy'])->name('privacy');

Route::get('/language/{lang}', [SmartController::class, 'switchLanguage'])->name('switch.language');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/* ── Dashboard (secret URL) ── */
Route::prefix('gestion-smart')->name('dashboard.')->group(function () {

    // Login (public inside this prefix)
    Route::get('/',        [DashboardController::class, 'loginForm'])->name('login');
    Route::post('/login',  [DashboardController::class, 'login'])->name('login.post');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

    // Protected — any dashboard role
    Route::middleware('dashboard.auth')->group(function () {
        Route::get('/home', [DashboardController::class, 'home'])->name('home');

        // Admin only
        Route::middleware('dashboard.auth:admin')->group(function () {
            Route::get('/admin',                [DashboardController::class, 'admin'])->name('admin');
            Route::post('/admin/users',         [DashboardController::class, 'createUser'])->name('admin.users.create');
            Route::delete('/admin/users/{id}',  [DashboardController::class, 'deleteUser'])->name('admin.users.delete');
        });

        // Categories CRUD — admin + marketing
        Route::middleware('dashboard.auth:admin,marketing')->group(function () {
            Route::post('/categories',                    [CategoryController::class, 'store'])->name('categories.store');
            Route::delete('/categories/{id}',             [CategoryController::class, 'destroy'])->name('categories.destroy');
            Route::post('/categories/{id}/cover',         [CategoryController::class, 'uploadCover'])->name('categories.cover.upload');
            Route::delete('/categories/{id}/cover',       [CategoryController::class, 'deleteCover'])->name('categories.cover.delete');
        });

        // Commercial only
        Route::middleware('dashboard.auth:commercial,admin')->group(function () {
            Route::get('/commercial',                [DashboardController::class, 'commercial'])->name('commercial');
            Route::get('/commercial/export',                [DashboardController::class, 'exportContacts'])->name('commercial.export');
            Route::get('/commercial/external-leads',        [DashboardController::class, 'externalLeads'])->name('commercial.external-leads');
            Route::get('/commercial/external-leads/export', [DashboardController::class, 'exportExternalLeads'])->name('commercial.external-leads.export');
            Route::get('/commercial/{id}',           [DashboardController::class, 'showContact'])->name('commercial.contact');
        });

        // Marketing only
        Route::middleware('dashboard.auth:marketing,admin')->group(function () {
            Route::get('/marketing',                    [DashboardController::class, 'marketing'])->name('marketing');
            Route::post('/marketing/{id}/toggle',       [DashboardController::class, 'togglePost'])->name('marketing.toggle');
            Route::delete('/marketing/{id}',            [DashboardController::class, 'destroyPost'])->name('marketing.destroy');
            Route::get('/marketing/events/create',      [DashboardController::class, 'createPost'])->name('marketing.create');
            Route::post('/marketing/events',            [DashboardController::class, 'storePost'])->name('marketing.store');
            Route::get('/marketing/events/{id}/edit',   [DashboardController::class, 'editPost'])->name('marketing.edit');
            Route::post('/marketing/events/{id}',       [DashboardController::class, 'updatePost'])->name('marketing.update');
            // Gallery
            Route::get('/gallery',                      [DashboardController::class, 'gallery'])->name('gallery');
            Route::post('/gallery/{id}/photos',         [DashboardController::class, 'updatePhotos'])->name('gallery.photos');
            Route::delete('/gallery/{id}/photo',        [DashboardController::class, 'deletePhoto'])->name('gallery.photo.delete');
            // Categories — view + upload photos (marketing + admin)
            Route::get('/categories',                    [CategoryController::class, 'index'])->name('categories');
            Route::get('/video-categories',              [DashboardController::class, 'videoCategories'])->name('video-categories');
            Route::get('/categories/{id}/photos',        [CategoryController::class, 'show'])->name('categories.show');
            Route::post('/categories/{id}/photos',       [CategoryController::class, 'uploadPhoto'])->name('categories.photos.upload');
            Route::delete('/categories/photos/{photoId}',[CategoryController::class, 'deletePhoto'])->name('categories.photos.delete');
        });
    });
});
