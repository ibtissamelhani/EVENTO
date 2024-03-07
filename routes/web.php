<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Organizer\EventController as OrganizerEventController;
use App\Http\Controllers\Organizer\InstitutionController;
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
})->name('/');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

;


/////////////////////////////////////// admin routes /////////////////////////////////////////

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('/category', CategoryController::class);
    Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');

    Route::resource('/event', EventController::class);

    Route::resource('/type', TypeController::class);
    Route::get('/types/search', [TypeController::class, 'search'])->name('types.search');

    Route::resource('/user', UserController::class);
    Route::post('/user/banne/{user}', [UserController::class, 'blockUser'])->name('user.banne');
    Route::post('/user/unbanne/{user}', [UserController::class, 'unblock'])->name('user.unbanne');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');

});

//////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////// organizer routes////////////////////////////////////////

Route::prefix('organizer')->name('organizer.')->group(function(){

    Route::resource('/institution', InstitutionController::class);

    Route::get('/dashboard', function () {
        return view('organizer.dashboard'); })->name('dashboard');
        
    Route::resource('/event', OrganizerEventController::class);
});

// //////////////////////////////////////////////////////////////////////////////////////////


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
