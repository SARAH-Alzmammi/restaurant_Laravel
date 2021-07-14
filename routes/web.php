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
Route::get('/home', function () {

    return redirect('/dishes');
});

Route::get('/', function () {
    return redirect('/dishes');
});

Route::get('/controlPanel', function () {
    return view('control_panel.index');
});
Route::get('/dishes/admin', function () {
    $dishes = Dishes::all();
    // dd($dishes);
    return view('dishes.admin',compact('dishes'));
});
Route::get('/not-admin', function () {
    return "You are not an admin";
});


// Route::get('/sayHi',function (){
// echo "Hi";
// })->middleware('AuthorizationCheck','auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('dishes',DishesController::class);


Route::resource('orders',OrdersController::class);
Route::resource('control_panel',OrdersController::class);
Route::resource('users',UsersController::class);



Route::get('addToCart/{id}',function(Request $request,$id){

    $request->session()->push('cart',$id);
    $request->session()->save();
//    dd($request->session()->get('cart'));

   return redirect()->route('dishes.index');

})->name('addToCart')->middleware('auth');




