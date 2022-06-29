<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\ContactMessage;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PolicyController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContractUsController;
use App\Http\Controllers\Backend\SocialLinkController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CapabilitiesController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\GRICertifiedController;
use App\Http\Controllers\Backend\PostCategoryController;
use App\Http\Controllers\Backend\ReturnPolicyController;
use App\Http\Controllers\Backend\SpnsorController;
use App\Http\Controllers\Backend\TrainingCategoryController;
use App\Http\Controllers\Backend\TrainingController;
use App\Http\Controllers\Backend\TrainingSubCategoryController;

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
// Service Serach Date Wise
Route::post('/search-date-service', [IndexController::class, 'dateWiseSearchService'])->name('date-search');
// Category Wise Service Search Routes
Route::get('/category/services/{cat_id}/{slug}', [IndexController::class, 'cateogrywiseServices']);
// SubCategory Wise Service Search Routes
Route::get('/subcategory/services/{subcat_id}/{slug}', [IndexController::class, 'subCateogrywiseServices']);
// Sub-SubCategory Wise Service Search Routes
Route::get('/subsubcategory/services/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCateogrywiseServices']);
// Single Blog Post
Route::get('/single-blog/{slug}', [IndexController::class, 'singleBlog'])->name('single.blog');
// Blog 
Route::get('/blog', [IndexController::class, 'allBlog'])->name('blog');
// Category Wise Post
Route::get('/category-wise-post/{slug}', [IndexController::class, 'categoryWisePost'])->name('category.wise.blog');
//Search Box Blog Search
Route::post('/blog-search', [IndexController::class, 'blogSearch'])->name('search.blog');
//Search Box Service Search
Route::post('/service-search', [IndexController::class, 'serviceSearch'])->name('search.service');
//About Us Page
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('about.us');
//Our Capabilities Page
Route::get('/our-capabilities', [IndexController::class, 'ourCapabilities'])->name('our.capabilities');
//GRI Certified Page
Route::get('/gri-certified-traning-partner', [IndexController::class, 'griCertified'])->name('gri.certified.training');
//Privacy Policy Page
Route::get('/privacy-policy', [IndexController::class, 'privacyPolicy'])->name('privacy.policy');
//Return Policy Page
Route::get('/return-policy', [IndexController::class, 'returnPolicy'])->name('return.policy');
//Gallery Page
Route::get('/gallery', [IndexController::class, 'gallery'])->name('gallery');


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


    // Admin All Service Category Routes
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


    // Admin All Post Category Routes
    Route::prefix('post-category')->group(function(){
        Route::get('/view', [PostCategoryController::class, 'postCategoryView'])->name('all.post.category');
        Route::post('/store', [PostCategoryController::class, 'postCategoryStore'])->name('post.category.store');
        Route::get('/edit/{id}', [PostCategoryController::class, 'postCategoryEdit'])->name('post.category.edit');
        Route::post('/update', [PostCategoryController::class, 'postCategoryUpdate'])->name('post.category.update');
        Route::get('/delete/{id}', [PostCategoryController::class, 'postCategoryDelete'])->name('post.category.delete');
    });

    // Admin All Post Routes
    Route::prefix('post')->group(function(){
        Route::get('/add', [PostController::class, 'addPost'])->name('add.post');
        Route::post('/store', [PostController::class, 'postStore'])->name('post.store');
        Route::get('/manage', [PostController::class, 'postManage'])->name('manage.post');
        Route::get('/view/{id}', [PostController::class, 'postView'])->name('post.view');
        Route::get('/edit/{id}', [PostController::class, 'postEdit'])->name('post.edit');
        Route::post('/update', [PostController::class, 'postUpdate'])->name('post.update');
        Route::get('/delete/{id}', [PostController::class, 'postDelete'])->name('post.delete');
    });

    // Settings All Routes
    Route::prefix('settings')->group(function () {
        //Contract Us Routes
        Route::get('/contract-us/edit', [ContractUsController::class, 'edit'])->name('contractUs.edit');
        Route::put('/contract-us/update/{id}', [ContractUsController::class, 'update'])->name('contractUs.update');

        //Social Link Routes
        Route::get('/social/edit', [SocialLinkController::class, 'edit'])->name('social.edit');
        Route::put('/social/update/{id}', [SocialLinkController::class, 'update'])->name('social.update');

        // SEO Routes
        Route::get('seos/edit', [SeoController::class, 'edit'])->name('seo.edit');
        Route::put('seos/update/{id}', [SeoController::class, 'update'])->name('seo.update');

        // About Routes
        Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('about/update/{id}', [AboutController::class, 'update'])->name('about.update');
      
        // Our Capabilities Routes
        Route::get('capabilities/edit', [CapabilitiesController::class, 'edit'])->name('capabilities.edit');
        Route::put('capabilities/update/{id}', [CapabilitiesController::class, 'update'])->name('capabilities.update');
      
        // GRI Certified Routes
        Route::get('certified/edit', [GRICertifiedController::class, 'edit'])->name('certified.edit');
        Route::put('certified/update/{id}', [GRICertifiedController::class, 'update'])->name('certified.update');

    });

    // Contact Message
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactMessage::class, 'allMessage'])->name('contact.message');
        Route::get('/delete/{id}', [ContactMessage::class, 'contactMDelete'])->name('contact.message.delete');
    });

    // Admin All Slider Routes
    Route::prefix('slider')->group(function(){
        Route::get('/view', [SliderController::class, 'sliderView'])->name('manage.slider');
        Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
    });

    // Privacy Policy Routes
    Route::prefix('policies')->group(function () {
        Route::get('/list', [PolicyController::class, 'list'])->name('policy.list');
        Route::post('/store', [PolicyController::class, 'store'])->name('policy.store');
        Route::get('/edit/{id}', [PolicyController::class, 'edit'])->name('policy.edit');
        Route::put('/update/{id}', [PolicyController::class, 'update'])->name('policy.update');
        Route::get('/delete/{id}', [PolicyController::class, 'delete'])->name('policy.delete');
    });

    // Return Policy Routes
    Route::prefix('returns')->group(function () {
        Route::get('/list', [ReturnPolicyController::class, 'list'])->name('return.list');
        Route::post('/store', [ReturnPolicyController::class, 'store'])->name('return.store');
        Route::get('/edit/{id}', [ReturnPolicyController::class, 'edit'])->name('return.edit');
        Route::put('/update/{id}', [ReturnPolicyController::class, 'update'])->name('return.update');
        Route::get('/delete/{id}', [ReturnPolicyController::class, 'delete'])->name('return.delete');
    });

    // Admin All Spnsor Routes
    Route::prefix('spnsor')->group(function(){
        Route::get('/view', [SpnsorController::class, 'spnsorView'])->name('manage.spnsor');
        Route::post('/store', [SpnsorController::class, 'spnsorStore'])->name('spnsor.store');
        Route::get('/edit/{id}', [SpnsorController::class, 'spnsorEdit'])->name('spnsor.edit');
        Route::post('/update', [SpnsorController::class, 'spnsorUpdate'])->name('spnsor.update');
        Route::get('/delete/{id}', [SpnsorController::class, 'spnsorDelete'])->name('spnsor.delete');
    });

    // Admin All Gallery Routes
    Route::prefix('gallery')->group(function(){
        Route::get('/view', [GalleryController::class, 'galleryView'])->name('gallery.list');
        Route::post('/store', [GalleryController::class, 'galleryStore'])->name('gallery.store');
        Route::get('/edit/{id}', [GalleryController::class, 'galleryEdit'])->name('gallery.edit');
        Route::post('/update', [GalleryController::class, 'galleryUpdate'])->name('gallery.update');
        Route::get('/delete/{id}', [GalleryController::class, 'galleryDelete'])->name('gallery.delete');
    }); 

    // Admin All Training Category Routes
    Route::prefix('training-category')->group(function(){
        Route::get('/view', [TrainingCategoryController::class, 'trainingCategoryView'])->name('all.training.category');
        Route::post('/store', [TrainingCategoryController::class, 'trainingCategoryStore'])->name('training.category.store');
        Route::get('/edit/{id}', [TrainingCategoryController::class, 'trainingCategoryEdit'])->name('training.category.edit');
        Route::post('/update', [TrainingCategoryController::class, 'trainingCategoryUpdate'])->name('training.category.update');
        Route::get('/delete/{id}', [TrainingCategoryController::class, 'trainingCategoryDelete'])->name('training.category.delete');

        // Admin All Training SubCategory Routes
        Route::get('/sub/view', [TrainingSubCategoryController::class, 'trainingSubCategoryView'])->name('all.training.subcategory');
        Route::post('/sub/store', [TrainingSubCategoryController::class, 'trainingSubCategoryStore'])->name('training.subcategory.store');
        Route::get('/sub/edit/{id}', [TrainingSubCategoryController::class, 'trainingSubCategoryEdit'])->name('training.subcategory.edit');
        Route::post('/sub/update', [TrainingSubCategoryController::class, 'trainingSubCategoryUpdate'])->name('training.subcategory.update');
        Route::get('/sub/delete/{id}', [TrainingSubCategoryController::class, 'trainingSubCategoryDelete'])->name('training.subcategory.delete');

        Route::get('/trainingsubcategory/ajax/{category_id}', [TrainingSubCategoryController::class, 'getTrainingSubCategory']);

    });


     // Admin All Training Routes
     Route::prefix('training')->group(function(){
        Route::get('/add', [TrainingController::class, 'addTraining'])->name('add.training');
        Route::post('/store', [TrainingController::class, 'trainingStore'])->name('training.store');
        Route::get('/manage', [TrainingController::class, 'trainingManage'])->name('manage.training');
        Route::get('/view/{id}', [TrainingController::class, 'trainingView'])->name('training.view');
        Route::get('/edit/{id}', [TrainingController::class, 'trainingEdit'])->name('training.edit');
        Route::post('/update', [TrainingController::class, 'trainingUpdate'])->name('training.update');
        Route::get('/delete/{id}', [TrainingController::class, 'trainingDelete'])->name('training.delete');
    });

});
