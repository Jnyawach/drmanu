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

/*General Routes*/
use App\Http\Controllers\General\ContactController;

Auth::routes();
Route::resource('/',MainController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([],function (){
    Route::resource('contact',ContactController::class);
});
Route::group(['middleware'=>'auth'], function (){
    Route::resource('admin/subscriptions',AdminSubscriptionController::class);
    Route::resource('admin/messages',AdminContactController::class);
    Route::resource('admin/policies',AdminPolicyController::class);
    Route::resource('admin/users',AdminUserController::class);
    Route::resource('admin/categories',AdminCategoryController::class);
    Route::resource('admin/roles',AdminRoleController::class);
    Route::resource('admin/profile',AdminProfileController::class);
    Route::resource('admin',AdminController::class);

});
