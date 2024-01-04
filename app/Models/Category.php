<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = ['id'];
    protected $appends = ['image'];

    public function scopeActive(Builder $builder)
    {
        $builder->where('status','=','active');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function getImagePathAttribute()
    {
        return asset('/uploads/images/' . $this->image);
    }
}
