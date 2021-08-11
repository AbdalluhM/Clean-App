<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\SupCategory;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    use GeneralTrait;
    public function index(){
        $user = Auth::user();
        $carts = cart::where('user_id', $user->id)->get();
        if ($carts->count() > 0) {
        return $this->returnData('carts', CartResource::collection($carts),"done");
        }
            return $this->returnError(400,"cart is empty");

    }


    public function store(CartRequest $request){
        $user=Auth::user();
        cart::create(array_merge($request->all(), ['user_id' => $user->id]));
        return $this->returnSuccessMessage("cart fill success ",200);
    }
}
