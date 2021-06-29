<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class ShopController extends Controller
{
    public function getBySubCat(Request $request, $slug)
    {
        $sub_category = SubCategory::where('s_cat_slug', $slug)->firstOrFail();
        // return view('product.byCat', ['products' => $products, 'brands' => $brands]);
        return view('product.byCat', ['sub_cat_id' => $sub_category->id, 'name' => $sub_category->name]);
    }

    public function getByCat(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $sub_cat_id = [];
        foreach ($category->subCategories as $subCategory) {
            array_push($sub_cat_id, $subCategory->id);
        }
        return view('product.byCat', ['sub_cat_id' => implode(",", $sub_cat_id), 'name' => $category->name]);
    }

    public function getProductDetail(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product.detail', ['product' => $product, 'brand' => Brand::find($product->brand_id)->name]);
    }

    public function getSearch(Request $request)
    {
        $request->validate([
            'keywords' => 'required|min:3',
        ]);

        $keyword = str_replace(" ", "%%", preg_replace("/\s+/", " ", trim(request()->input('keywords'))));

        $products = Product::where('keywords', 'like', "%$keyword%")->orWhere('name', 'like', "%$keyword%")->get();

        return view('product.busqueda', ['products' => $products]);
    }
}
