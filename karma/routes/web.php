<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeContrller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\Dashboardcontroller;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\pyment\PaypalController;
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
//Home route
Route::get('/', [HomeContrller::class,'index'])->name('front.index');
Route::get('/categoray',[HomeContrller::class,'category'])->name('front.category');
Route::get('/product/{id}',[HomeContrller::class,'products'])->name('products.show');

//Order route
Route::post('order/store',[OrderController::class,'store'])->name('order');

//Cat route
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/add/{id}',[CartController::class,'add'])->name('cart.add');

//Checkout Controller
Route::get('chekout/{order}',[CheckOutController::class,'index'])->name('checkout');

//Dashboard route
Route::middleware('auth','isAdmin')->prefix('admin')->name('dashboard.')->group(function(){
    Route::get('/',[Dashboardcontroller::class,'index'])->name('index');

Route::get('/products',[Dashboardcontroller::class,'productes'])->name('products');

// Category route

Route::resource('categories', CategoryController::class);

//Product route
Route::resource('products', ProductController::class);
}

);

//paypal route
Route::get('paypal/create/{order}',[PaypalController::class,'create'])->name('paypal.create');
Route::get('paypal/cancel/{order}',[PaypalController::class,'cancel'])->name('paypal.cancel');
Route::get('paypal/return/{order}',[PaypalController::class,'callback'])->name('paypal.return');




Route::get('/signin',[HomeContrller::class,'signin'])->name('signin');
Route::get('/signup',[HomeContrller::class,'signup'])->name('signup');


//////////////////////////////////////////////////

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Dashboard route

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
