<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Brand;

class ShopController extends Controller
{
    public function getByCat(Request $request, $slug)
    {
        $sub_category = SubCategory::where('s_cat_slug', $slug)->firstOrFail();
        // return view('product.byCat', ['products' => $products, 'brands' => $brands]);
        return view('product.byCat', ['sub_cat_id' => $sub_category->id, 'sub_cat_name' => $sub_category->name]);
    }
}
