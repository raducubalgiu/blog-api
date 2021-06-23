<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductDetails
 *
 * @property int $id
 * @property string $product_description
 * @property string $product_color
 * @property string $product_material
 * @property string $product_style
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereProductColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereProductDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereProductMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereProductStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDetails whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
