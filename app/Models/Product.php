<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "products";

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function productDetails() {
        return $this->hasOne(ProductDetails::class);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class);
    }
}
