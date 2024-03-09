<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\InstitutionController as AdminInstitutionController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Organizer\EventController as OrganizerEventController;
use App\Http\Controllers\Organizer\EventUserController as OrganizerEventUserController;
use App\Http\Controllers\Organizer\InstitutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\EventUserController;
use App\Http\Controllers\User\homeController;
use App\Http\Controllers\User\PdfController;
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

Route::get('/', [homeController::class, 'index'])->name('/');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

;


/////////////////////////////////////// admin routes /////////////////////////////////////////

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('/category', CategoryController::class);
    Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');

    Route::resource('/event', EventController::class);
    Route::post('/event/publish/{event}', [EventController::class, 'publishEvent'])->name('event.publish');
    Route::post('/event/unpublish/{event}', [EventController::class, 'unpublishEvent'])->name('event.unpublish');


    Route::resource('/type', TypeController::class);
    Route::get('/types/search', [TypeController::class, 'search'])->name('types.search');

    Route::resource('/user', UserController::class);
    Route::post('/user/banne/{user}', [UserController::class, 'blockUser'])->name('user.banne');
    Route::post('/user/unbanne/{user}', [UserController::class, 'unblock'])->name('user.unbanne');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');


    Route::resource('/institution', AdminInstitutionController::class);

});

//////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////// organizer routes////////////////////////////////////////

Route::prefix('organizer')->name('organizer.')->group(function(){

    Route::resource('/institution', InstitutionController::class);

    Route::resource('/request', OrganizerEventUserController::class);

    Route::get('/dashboard', function () {
        return view('organizer.dashboard'); })->name('dashboard');
        
    Route::resource('/event', OrganizerEventController::class);


});

////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////// user routes //////////////////////////////
Route::prefix('user')->name('user.')->group(function() {

    Route::resource('/event', UserEventController::class);
    Route::resource('/eventUser', EventUserController::class);
    Route::get('/generate-pdf/{eventUser}', [PdfController::class, 'generatePdf'])->name('reservation');
    Route::get('/sendTicket/{eventUser}', [PdfController::class, 'sendTicket'])->name('email');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
