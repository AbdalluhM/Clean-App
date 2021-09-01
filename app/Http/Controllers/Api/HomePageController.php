<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use App\Models\Category;
use App\Models\SupCategory;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    use GeneralTrait ;
    public function slider(){
        $slider=Slider::all();
        return $this->returnData('sliders',$slider,"done");
    }
    public function categories(){
        $categories=Category::paginate(4);
        return $this->returnData('categories',$categories,"done");
    }

    public function best_services(){
        $services=SupCategory::whereNotNull('adv')->paginate(4);
        return $this->returnData('bestService',$services,"done");
    }

    public function service(){
        $service=SupCategory::where("category_id",2)->paginate(4);
        return $this->returnData('service',$service,"done");
    }
}
