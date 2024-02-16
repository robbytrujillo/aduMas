<?php

use App\Http\Controllers\Dashboard\AduanController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FooterController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth', 'role:admin|moderator'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/aduan', AduanController::class);
    Route::post('/aduan/{id}/store-status', [AduanController::class, 'updateStatus'])->name('aduan.store_status');
    Route::resource('/categories', CategoryController::class);
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('/update-footers', [FooterController::class, 'updateFooters']);
    Route::resource('/permissions', PermissionController::class);
});

require __DIR__.'/auth.php';
