<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable=['image','description'];
    protected $append = ['slider_image_path'];

    public function getSliderImagePathAttribute(){
        return asset('storage/images/sliders/'.($this->image));
    }
}
