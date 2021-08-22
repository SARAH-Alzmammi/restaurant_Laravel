<?php

use App\Models\Dishes;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\CartControllers;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return redirect('/dishes');
});

Auth::routes();


Route::resource('dishes',DishesController::class);


Route::resource('orders',OrdersController::class)->middleware('auth');
Route::resource('control_panel',OrdersController::class)->middleware('auth');
Route::resource('users',UsersController::class)->middleware('auth');


Route::get('/controlPanel', function () {
    return view('controlPanel.index');
})->middleware('auth');

Route::get('/dishes/admin', function () {
    $dishes = Dishes::all();

    return view('dishes.admin',compact('dishes'));
})->middleware('auth');




Route::get('/not-admin', function () {
    return "You are not an admin";
});




Route::get('addToCart/{id}',function(Request $request,$id){

    $request->session()->push('cart',$id);
    $request->session()->save();

    session(['addingMessage' => 'Dish was added to your cart successfully']);
   return redirect()->route('dishes.index');

})->name('addToCart')->middleware('auth');




