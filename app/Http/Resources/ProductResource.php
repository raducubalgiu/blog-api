<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'product_name' => $this->product_name,
            'product_image' => $this->product_image,
            'product_price' => $this->product_price,
            'supercategory_id' => $this->supercategory_id,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'brand_id' => $this->brand_id,
            'average_review' => $this->average_review,
            'product_details' => $this->productDetails,
            'supercategory' => $this->supercategory,
            'brand' => $this->brand,
            'reviews' => $this->reviews
        ];
    }
}
