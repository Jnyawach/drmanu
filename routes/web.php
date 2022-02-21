<?php

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
use App\Http\Controllers\MainController;

/*Admin Routes*/
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPolicyController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminSubscriptionController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\PostStatusController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\BlogStatus;
use App\Http\Controllers\Admin\AdminSectionController;
use App\Http\Controllers\Admin\AttachPost;
use App\Http\Controllers\Admin\DettachPost;
use App\Http\Controllers\Admin\AdminResourceController;
use App\Http\Controllers\Admin\ResourceCategory;
use App\Http\Controllers\Admin\ResourceStatus;
use App\Http\Controllers\Admin\AdminCareerController;



/*General Routes*/
use App\Http\Controllers\General\ContactController;
use \App\Http\Controllers\General\imageUpload;
use \App\Http\Controllers\General\ExploreController;
use \App\Http\Controllers\General\ArticlesController;
use \App\Http\Controllers\General\ResourcesController;
use \App\Http\Controllers\General\NewsletterController;
use \App\Http\Controllers\General\PrivacyPolicy;
use \App\Http\Controllers\General\HealthResourceController;
use \App\Http\Controllers\General\CareerController;

Auth::routes();
Route::resource('/',MainController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([],function (){
    Route::get('about-us',  [MainController::class, 'about'])->name('about-us');
    Route::get('terms-of-use',  [MainController::class, 'termsPolicy'])->name('terms-of-use');
    Route::get('privacy-policy',  [MainController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('advertising-policy',  [MainController::class, 'advertPolicy'])->name('advertising-policy');
    Route::get('advertise-with-us',  [MainController::class, 'advertise'])->name('advertise');
    Route::resource('careers',CareerController::class);
    Route::resource('health-resources',HealthResourceController::class);
    Route::resource('newsletter',NewsletterController::class);
    Route::resource('resources',ResourcesController::class);
    Route::resource('articles',ArticlesController::class);
    Route::resource('explore',ExploreController::class);
    Route::resource('contact',ContactController::class);
    Route::post('image-upload',['as'=>'image-upload','uses'=>imageUpload::class]);
});
Route::group(['middleware'=>'auth'], function (){
    Route::resource('admin/jobs',AdminCareerController::class);
    Route::get('admin/resources/resource-status/{id}',['as'=>'resource-status','uses'=>ResourceStatus::class]);
    Route::get('admin/resources/resource-category/{id}',['as'=>'resource-category','uses'=>ResourceCategory::class]);
    Route::resource('admin/resources',AdminResourceController::class);
    Route::patch('post-unlink/{id}',['as'=>'post-unlink','uses'=>DettachPost::class]);
    Route::patch('post-link/{id}',['as'=>'post-link','uses'=>AttachPost::class]);
    Route::get('admin/sections/attach-post/{id}',[AdminSectionController::class, 'attachPost'])->name('attach-post');
    Route::resource('admin/sections',AdminSectionController::class);
    Route::patch('blog-status/{id}',['as'=>'blog-status','uses'=>BlogStatus::class]);
    Route::get('admin/blogs/post-status/{id}',['as'=>'post-status','uses'=>PostStatusController::class]);
    Route::get('admin/blogs/post-category/{id}',['as'=>'post-category','uses'=>PostCategoryController::class]);
    Route::resource('admin/blogs',AdminBlogController::class);
    Route::resource('admin/news',AdminNewsController::class);
    Route::resource('admin/subscriptions',AdminSubscriptionController::class);
    Route::resource('admin/messages',AdminContactController::class);
    Route::resource('admin/policies',AdminPolicyController::class);
    Route::resource('admin/users',AdminUserController::class);
    Route::resource('admin/categories',AdminCategoryController::class);
    Route::resource('admin/roles',AdminRoleController::class);
    Route::resource('admin/profile',AdminProfileController::class);
    Route::resource('admin',AdminController::class);

});
