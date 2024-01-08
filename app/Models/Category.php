<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $guarded = ['id'];
    protected $appends = ['image'];

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function getImagePathAttribute()
    {
        return asset('/uploads/categories/' . $this->image);
    }
}
