<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ptoductController;
use App\Http\Controllers\forntEnd\forntendController;



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


Route::get('/',[forntendController::class,'index']);
Route::get('category',[forntendController::class,'category']);
Route::get('view-category/{id}',[forntendController::class,'viewcat']);
Route::get('category/{cate_name}/{item_name}',[forntendController::class,'productview']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard', 
      'Admin\Fornendcontroller@index');
      Route::get('categories', 
      'Admin\categoryController@index');
      Route::get('addCategory', 
      'Admin\categoryController@add');
      Route::post('inscategory','Admin\categoryController@insert');
      Route::get('edit-curd/{id}',[categoryController::class,'edit']);
      Route::put('update-category/{id}',[categoryController::class,'update']);
      Route::get('delete-category/{id}',[categoryController::class,'destroy']);
      Route::get('product',[ptoductController::class,'index']);
      Route::get('addProduct',[ptoductController::class,'add']);
      Route::post('insproduct',[ptoductController::class,'insert']);
      Route::get('edit-product/{id}',[ptoductController::class,'edit']);
      Route::put('update-product/{id}',[ptoductController::class,'update']);
      Route::get('delete-product/{id}',[ptoductController::class,'destroy']);


 });
