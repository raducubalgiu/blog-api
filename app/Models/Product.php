<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $product_name
 * @property string $product_image
 * @property string $product_price
 * @property int $subcategory_id
 * @property int $brand_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\ProductDetails|null $productDetails
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Size[] $sizes
 * @property-read int|null $sizes_count
 * @property-read \App\Models\Subcategory $subcategory
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\Supercategory $supercategory
 * @property int $supercategory_id
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSupercategoryId($value)
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "products";
    /**
     * @var mixed
     */
    private $title;

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function supercategory() {
        return $this->belongsTo(Supercategory::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function productDetails() {
        return $this->hasOne(ProductDetails::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function getAverageReviewAttribute() {
        return round($this->reviews->average(fn(Review $review) => $review->stars), 0);
    }
}
