<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupCategory extends Model
{
    use HasFactory;
    protected $table = 'sup_categories';
    protected $fillable=['name','category_id','image','desc',];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function ServiceDetails(){
        return $this->hasMany(RecieveDetails::class);
    }

}
