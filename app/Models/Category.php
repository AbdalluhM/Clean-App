<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $appends=['category_image_path'];
    protected $fillable=['name','image','desc',];

    public function sup_category(){
        return $this->hasMany(SupCategory::class);
    }
    public function getCategoryImagePathAttribute()
    {
        return asset('storage/images/categories/'.($this->image));
    }
}
