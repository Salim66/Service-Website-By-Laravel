<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactMessage;
use App\Http\Controllers\Backend\ContractUsController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SocialLinkController;
use App\Http\Controllers\Backend\SubCategoryController;
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
// Service Details Page
Route::get('/service-detials/{slug}', [IndexController::class, 'serviceDetails'])->name('service-details');
Route::get('/download-service-pdf/{id}', [IndexController::class, 'downloadServicePDF'])->name('download-service-pdf');
// Category Wise Service
Route::get('/category-wise-service/{slug}', [IndexController::class, 'categoryWiseService'])->name('category.wise.service');


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


    // Admin All Category Routes
    Route::prefix('category')->group(function(){
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

        // Admin All SubCategory Routes
        Route::get('/sub/view', [SubCategoryController::class, 'subCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'subCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update', [SubCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete');

        // Admin All Sub->SubCategory Routes
        Route::get('/sub/sub/view', [SubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory');
        Route::post('/sub/sub/store', [SubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update', [SubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');
        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']);
        Route::get('/subsubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategory']);
    });

    // Admin All Service Routes
    Route::prefix('service')->group(function(){
        Route::get('/add', [ServiceController::class, 'addService'])->name('add.service');
        Route::post('/store', [ServiceController::class, 'serviceStore'])->name('service.store');
        Route::get('/manage', [ServiceController::class, 'serviceManage'])->name('manage.service');
        Route::get('/view/{id}', [ServiceController::class, 'serviceView'])->name('service.view');
        Route::get('/edit/{id}', [ServiceController::class, 'serviceEdit'])->name('service.edit');
        Route::post('/update', [ServiceController::class, 'serviceUpdate'])->name('service.update');
        Route::get('/delete/{id}', [ServiceController::class, 'serviceDelete'])->name('service.delete');
    });


    // Settings All Routes
    Route::prefix('settings')->group(function () {
        //Contract Us Routes
        Route::get('/contract-us/edit', [ContractUsController::class, 'edit'])->name('contractUs.edit');
        Route::put('/contract-us/update/{id}', [ContractUsController::class, 'update'])->name('contractUs.update');

        //Social Link Routes
        Route::get('/social/edit', [SocialLinkController::class, 'edit'])->name('social.edit');
        Route::put('/social/update/{id}', [SocialLinkController::class, 'update'])->name('social.update');

    });

    // Contact Message
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactMessage::class, 'allMessage'])->name('contact.message');
        Route::get('/delete/{id}', [ContactMessage::class, 'contactMDelete'])->name('contact.message.delete');
    });

});
