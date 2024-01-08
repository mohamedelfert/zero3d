<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $guarded = ['id'];
    protected $appends = ['image'];

    // use global scope
    public static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', '=', 'active');
        });

//        static::addGlobalScope('active', new ProductScope());
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImagePathAttribute()
    {
        return asset('/uploads/products/' . $this->image);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
