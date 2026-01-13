<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\LicenseController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\LicenseManagementController;
use App\Http\Controllers\Admin\ProductManagementController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserManagementController::class, 'index'])
        ->name('admin.users');
    Route::get('/admin/users/{id}/edit', [UserManagementController::class, 'edit'])
    ->name('admin.users.edit');
    Route::put('/admin/users/{id}/edit', [UserManagementController::class, 'update'])
    ->name('admin.users.update');
    Route::delete('/admin/users/{id}/delete', [UserManagementController::class, 'delete'])
    ->name('admin.users.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', [ProductManagementController::class, 'index'])
        ->name('admin.products');
    Route::get('/admin/products/create', [ProductManagementController::class, 'create'])
    ->name('admin.products.create');
    Route::post('/admin/products/create', [ProductManagementController::class, 'store'])
    ->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [ProductManagementController::class, 'edit'])
    ->name('admin.products.edit');
    Route::put('/admin/products/{id}/edit', [ProductManagementController::class, 'update'])
    ->name('admin.products.update');
    Route::delete('/admin/products/{id}/delete', [ProductManagementController::class, 'delete'])
    ->name('admin.products.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/licenses', [LicenseManagementController::class, 'index'])
        ->name('admin.licenses');
    Route::get('/admin/licenses/add', [LicenseManagementController::class, 'add'])
        ->name('admin.licenses.add');
    Route::post('/admin/licenses/add', [LicenseManagementController::class, 'store'])
        ->name('admin.licenses.store');
    Route::get('/admin/licenses/{id}/edit', [LicenseManagementController::class, 'edit'])
        ->name('admin.licenses.edit');
    Route::put('/admin/licenses/{id}/edit', [LicenseManagementController::class, 'update'])
        ->name('admin.licenses.update');
    Route::delete('/admin/licenses/{id}/delete', [LicenseManagementController::class, 'delete'])
        ->name('admin.licenses.delete');

    Route::get('/admin/licenses/users/{id}', [LicenseManagementController::class, 'users'])
        ->name('admin.licenses.users');
    Route::post('/admin/licenses/add_user/{id}', [LicenseManagementController::class, 'add_user'])
        ->name('admin.licenses.add_user');
    Route::delete('/admin/licenses/remove_user/{id}', [LicenseManagementController::class, 'remove_user'])
        ->name('admin.licenses.remove_user');

});

Route::middleware('auth')->group(function () {
    Route::get('/user/licenses', [LicenseController::class, 'index'])
        ->name('user.licenses');
});



require __DIR__.'/auth.php';
