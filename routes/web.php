<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\ContractUsController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

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

//Frontend Routes

Route::get('/', [IndexController::class, 'index']);
Route::get('/contact-us', [IndexController::class, 'contactUs'])->name('contact.us');
Route::post('/contact/store', [IndexController::class, 'contactStore'])->name('contact.store');


// Frontend all routes
Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Backend all routes

Route::group(['prefix' => 'admin', 'middleware' => 'admin:admin'], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // Admin Logout route
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    // Admin Profile Route
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfileView'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminChnagePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminProfileController::class, 'adminUpdatePassword'])->name('admin.update.password');

    // Settings All Routes
    Route::prefix('settings')->group(function () {
        //Contract Us Routes
        Route::get('/contract-us/edit', [ContractUsController::class, 'edit'])->name('contractUs.edit');
        Route::put('/contract-us/update/{id}', [ContractUsController::class, 'update'])->name('contractUs.update');
    });

});
