<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = ['id'];

    public function parents()
    {
        return $this->hasMany(Category::class, 'id', 'parent_id');
    }

    protected $appends = ['image'];

    public function getImagePathAttribute(){
        return asset('/uploads/images/' . $this->image);
    }
}
