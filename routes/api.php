<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Models\Brand;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandCollection;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Models\SubCategory;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\SubCategoryCollection;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/category/{id}', function ($id) {
    return new CategoryResource(Category::findOrFail($id));
});

Route::get('/categories', function () {
    return new CategoryCollection(Category::all());
});

Route::get('/brand/{id}', function ($id) {
    return new BrandResource(Brand::findOrFail($id));
});

Route::get('/brands', function () {
    $brands = Brand::withCount(['products' => function ($query) {
        $query->withFilters(
            request()->input('brands', []),
            request()->input('subcategories', [])
        );
    }])->get();

    return new BrandCollection($brands);
});

Route::get('/product/{id}', function ($id) {
    return new ProductResource(Product::findOrFail($id));
});

Route::get('/products', function () {
    $products = Product::has('productImages')->has('productValues')->withFilters(
        request()->input('brands', []),
        request()->input('subcategories', [])
    )->paginate(20);

    return new ProductCollection($products);
});

Route::get('/sub-category/{id}', function ($id) {
    return new SubCategoryResource(SubCategory::findOrFail($id));
});

Route::get('/sub-categories', function () {
    $subcategories = SubCategory::withCount(['products' => function ($query) {
        $query->withFilters(
            request()->input('brands', []),
            request()->input('subcategories', [])
        );
    }])->get();

    return new SubCategoryCollection($subcategories);
});
