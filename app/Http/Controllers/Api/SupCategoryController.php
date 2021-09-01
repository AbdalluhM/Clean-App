<?php

namespace App\Http\Controllers\Api;

use App\Models\SupCategory;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupCategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class SupCategoryController extends Controller
{
    use GeneralTrait ;

    public function index(Request $request){
        $req = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);
        if($req->fails()){
            return $this->returnError(422, $req->errors());

        }
        $SupCategories =SupCategory::where('category_id',$request->category_id)->get();
        // dd($SupCategories);
          if ($SupCategories->count()>0) {
              # code...
              return $this->returnData('SupCategories',SupCategoryResource::collection($SupCategories),"");
          }
         return $this->returnError(400,"this category doesnot have any service" );
   }

   public function sup_category(Request $request){
    $req = Validator::make($request->all(), [
        'sup_category_id' => 'required|exists:sup_categories,id',
    ]);
    if($req->fails()){
        return $this->returnError(422, $req->errors());

    }
    $SupCategories =SupCategory::where('id',$request->sup_category_id)->first();
    // dd($SupCategories);
   try {
       return $this->returnData('SupCategories',SupCategoryResource::make($SupCategories),"");
   } catch (\Throwable $th) {
       return $this->returnError(500,$th->getMessage());
   }
}
}
