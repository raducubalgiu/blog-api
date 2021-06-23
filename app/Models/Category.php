<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subcategory[] $subcategories
 * @property-read int|null $subcategories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $supercategory_id
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSupercategoryId($value)
 * @property-read \App\Models\Supercategory $supercategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Supercategory[] $supercategories
 * @property-read int|null $supercategories_count
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supercategories() {
        return $this->belongsToMany(Supercategory::class);
    }

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }
}
