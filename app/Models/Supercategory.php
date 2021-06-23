<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Supercategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Supercategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supercategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supercategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supercategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supercategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supercategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supercategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supercategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
