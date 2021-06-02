<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ProductImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productValues()
    {
        return $this->hasMany(ProductValue::class);
    }

    public function scopeWithFilters($query, $brands, $subcategories)
    {
        return $query->when(count($brands), function ($query) use ($brands) {
            $query->whereIn('brand_id', $brands);
        })
        ->when(count($subcategories), function ($query) use ($subcategories) {
            $query->whereIn('sub_category_id', $subcategories);
        });
    }
}
