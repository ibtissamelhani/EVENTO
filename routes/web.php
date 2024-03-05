<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/////////////////////////////////////// admin routes /////////////////////////////////////////

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('/category', CategoryController::class);
    Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');
    
    Route::resource('/type', TypeController::class);
    Route::get('/type/search', [TypeController::class, 'search'])->name('type.search');

    Route::resource('/user', UserController::class);
    Route::post('/user/banne/{user}', [UserController::class, 'blockUser'])->name('user.banne');
    Route::post('/user/unbanne/{user}', [UserController::class, 'unblock'])->name('user.unbanne');
});

//////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
