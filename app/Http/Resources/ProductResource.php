<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Brand;
use App\Models\ProductType;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'brand' => Brand::find($this->brand_id)->name,
            'price' => number_format($this->productValues[0]->price, 0, '.', '.'),
            'img_url' => $this->productImages[0]->img_url,
            'stock' => $this->productValues[0]->productStock->stock ?? '0',
            'product_features' => count($this->productValues[0]->productFeatures) > 0 ? $this->productValues[0]->productFeatures : null,
            'product_discount' => $this->productValues[0]->productDiscounts ? number_format($this->productValues[0]->price * (( 100 - $this->productValues[0]->productDiscounts->percentage ) / 100),  0, '.', '.') : null,
        ];
    }
}
