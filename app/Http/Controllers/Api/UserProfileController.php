<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    use GeneralTrait;
    public function index(){

        $user=Auth::user();
         try {
            $user=User::where('id',$user->id)->get();
            return $this->returnData('profile',$user,"");
        } catch (\Throwable $th) {
            return $this->returnError(500,$th->getMessage());
        }
    }


    public function update(Request $request){
        $req = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'phone' => 'required|string|unique:users',
            'image' => 'required|image|mimes:jpg,png',
        ]);

        if($req->fails()){
            return response()->json([
                "message"=>$req->errors()
            ], 400);
        }
       $user= Auth::user();
       User::where('id', $user->id)->update([
           'name'=>$request->name,
           'phone'=>$request->phone,
           'image'=>$request->image->store('images/users',)
       ]);

    }
}
