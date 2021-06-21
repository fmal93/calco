<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
