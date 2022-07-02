<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ptoductController;
use App\Http\Controllers\Admin\Fornendcontroller;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\dashboardController;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\forntEnd\forntendController;
use App\Http\Controllers\forntEnd\cartController;
use App\Http\Controllers\forntEnd\userController;
use App\Http\Controllers\forntEnd\checkoutController;
use App\Http\Controllers\forntEnd\wishlistController;
use App\Http\Controllers\forntEnd\ratingController;
use App\Http\Controllers\forntEnd\reviewController;








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


Route::get('product-list',[forntendController::class,'productlistAjax']);
Route::post('searchproduct',[forntendController::class,'searchproduct']);




Route::get('load-cart-data',[cartController::class,'cartcount']);
Route::get('load-wishlist-data',[wishlistController::class,'wishcount']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart',[cartController::class,'addProduct']);
Route::post('delete_cart_item',[cartController::class,'deleteprod']);
Route::post('update_cart',[cartController::class,'updatecart']);
Route::post('add-to-wishlist',[wishlistController::class,'add']);
Route::post('delete_wishlist_item',[wishlistController::class,'deletewishlist']);



Route::middleware(['auth'])->group(function () {
  Route::get('cart',[cartController::class,'viewcart']);
  Route::get('checkout',[checkoutController::class,'index']);
  Route::post('place-order',[checkoutController::class,'placeorder']);
  Route::get('my-orders',[userController::class,'index']);
  Route::get('view-order/{id}',[userController::class,'view']);
  Route::get('wishlist',[wishlistController::class,'index']);
  Route::post('add_rating',[ratingController::class,'addRatting']);
  Route::get('add_review/{product_name}/userreview',[reviewController::class,'addreview']);
  Route::post('add_review',[reviewController::class,'create']);
  Route::get('edit_review/{product_name}/userreview',[reviewController::class,'edit']);
  Route::put('update_review',[reviewController::class,'update']);

 

});

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
      Route::get('orders',[orderController::class,'index']);
      Route::get('admin/view-order/{id}',[orderController::class,'view']);
      Route::put('update-order/{id}',[orderController::class,'updateOrder']);
      Route::get('order-history',[orderController::class,'orderhistory']);
      Route::get('users',[dashboardController::class,'users']);
      Route::get('view-user/{id}',[dashboardController::class,'viewuser']);


   


   
    


 });
