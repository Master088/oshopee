<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//admin routs
Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function () {
    // Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    // Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    // Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // //products routes 
    // Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    // Route::post('/products/store',[ProductController::class,'store'])->name('admin.products.store');
    // Route::put('/products/update/{id}',[ProductController::class,'update'])->name('admin.products.update');
    // Route::delete('/products/image/{id}',[ProductController::class,'deleteImage'])->name('admin.products.image.delete');
    // Route::delete('/products/destory/{id}',[ProductController::class,'destory'])->name('admin.products.destory');

});



require __DIR__ . '/auth.php';