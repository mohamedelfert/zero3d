<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stores';

    protected $guarded = ['id'];
    protected $appends = ['logo_image', 'cover_image'];

    // use global scope
//    public static function booted()
//    {
//        static::addGlobalScope('active', function (Builder $builder) {
//            $builder->where('status', '=', 'active');
//        });
//
////        static::addGlobalScope('active', new ProductScope());
//    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    public function getLogoImagePathAttribute()
    {
        return asset('/uploads/stores/' . $this->image);
    }

    public function getCoverImagePathAttribute()
    {
        return asset('/uploads/stores/' . $this->image);
    }
}
