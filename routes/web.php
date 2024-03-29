<?php

use App\Http\Controllers\Dashboard\AduanController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FooterController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RemoveRoleFromUserController;
use App\Http\Controllers\Dashboard\RevokePermissionFromRoleController;
use App\Http\Controllers\Dashboard\RevokePermissionFromUserController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
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

/*
|--------------------------------------------------------------------------
| Dashboard Routes Admin dan Moderator
|--------------------------------------------------------------------------
|
*/
Route::middleware(['auth', 'role:admin|moderator'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/aduan', AduanController::class);
    Route::post('/aduan/{id}/store-status', [AduanController::class, 'updateStatus'])->name('aduan.store_status');
    Route::resource('/categories', CategoryController::class);
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('/update-footers', [FooterController::class, 'updateFooters']);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/post', PostController::class);
    Route::delete('/users/{user}/role/{role}', RemoveRoleFromUserController::class)->name('users.roles.destroy');
    Route::delete('/roles/{role}/permissions/{permission}', RevokePermissionFromRoleController::class)->name('roles.permissions.destroy');
    Route::delete('/users/{user}/permissions/{permission}', RevokePermissionFromUserController::class)->name('users.permissions.destroy');
    Route::resource('/roles', RoleController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/users', UserController::class);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes Untuk User
|--------------------------------------------------------------------------
|
*/
Route::middleware(['auth', 'role:user'])->prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/aduanuser', [AduanController::class, 'indexUser'])->name('aduan.user');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/', [AduanController::class, 'store'])->name('aduan.store');
Route::get('aduan/{slug}', [AduanController::class, 'show'])->name('aduan.detail');
Route::get('/tags/{slug}', [TagController::class, 'show'])->name('tags.show');
Route::get('/poststag/{slug}', [PostController::class, 'postByTag'])->name('posts.tag');
Route::get('/postscategory/{slug}', [PostController::class, 'postByCategory'])->name('posts.category');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.detail');
Route::post('/aduans/{aduan}/update-status', [AduanController::class, 'updateStatus'])->name('aduans.updateStatus');

require __DIR__.'/auth.php';
