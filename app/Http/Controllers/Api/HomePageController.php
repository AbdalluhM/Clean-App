<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SupCategory;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use GeneralTrait ;
    public function categories(){
        $categories=Category::paginate(4);
        return $this->returnData('categories',$categories,"done");
    }

    public function best_services(){
        $services=SupCategory::whereNotNull('adv')->paginate(4);
        return $this->returnData('best service',$services,"done");
    }

    public function service(){
        $service=SupCategory::where("category_id",2)->paginate(4);
        return $this->returnData('service',$service,"done");
    }
}
