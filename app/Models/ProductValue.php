<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function productStocks()
    {
        return $this->hasOne(ProductStock::class);
    }

    public function productDiscounts()
    {
        return $this->hasOne(ProductDiscount::class);
    }

    public function productFeatures()
    {
        return $this->hasMany(productFeature::class);
    }
}
