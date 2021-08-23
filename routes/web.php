<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
    $products = Product::where('Recommended', '=', True)->get();
    
    return view('welcome', [ 'products' => $products ]);
});

Route::get('/sub-category/{slug}', [ShopController::class, 'getBySubCat']);
Route::get('/category/{slug}', [ShopController::class, 'getByCat']);
Route::get('/product/{slug}', [ShopController::class, 'getProductDetail']);
Route::get('/busqueda', [ShopController::class, 'getSearch']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/carrito', [CartController::class, 'index']);
Route::get('/add-to-cart/{id}', [CartController::class, 'getAddToCart']);
Route::get('/remove/{id}', [CartController::class, 'getRemoveItem']);
Route::get('/update-cart', [CartController::class, 'getupdateItem']);
Route::get('/add-many', [CartController::class, 'getAddManyItem']);
Route::get('/get-discount', [CartController::class, 'getDiscountItems']);

Route::post('/checkout', [CheckoutController::class, 'initTransaction']);
Route::get('/checkout-form', [CheckoutController::class, 'getCheckoutForm']);
Route::get('/checkout-return', [CheckoutController::class, 'confirmTransaction']);
Route::post('/checkout-return', [CheckoutController::class, 'confirmTransaction']);
