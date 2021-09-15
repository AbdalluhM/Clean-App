<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Requests\SocialRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;

class AuthController extends Controller
{
    use GeneralTrait;
    // login user
    public function signin(Request $request)
    {
        // dd("sssssssss");
        $req = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|string|min:5',
        ]);
        if ($req->fails()) {
            $errors = collect($req->errors())->map(function ($error) {
                return $error[0];
            });

            // return $this->returnError(422, array_values($errors->toArray()));
            return response()->json([
                'status' => 'false',
                'errNum' => 422,
                'errors' => array_values($errors->toArray()),
            ], 422);
        }
        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->returnData("access_token", $success, 'User Signed in');
        }
        // elseif (Auth::attempt(['phone' => $request->email, 'password' => $request->password])) {
        //     $authUser = Auth::user();
        //     $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
        //     $success['name'] =  $authUser->name;

        //     return $this->returnData("access_token", $success, 'User Signed in');
        // }
        else {
            // return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            return $this->returnError(400, " you must register first");
        }
    }


    // register
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            // 'email' => 'email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|string|unique:users',
            'image' => 'image',
            'fcm_token' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->map(function ($error) {
                return $error[0];
            });
            // dd(implode(',',$validator->messages()->all()));
            return response()->json([
                'status' => 'false',
                'errNum' => 422,
                'errors' => implode(',',$validator->messages()->all()),
            ], 422);
        }

        $input = $request->all();
        if (request()->hasFile('image')) {
            $image = time() . '_' . $request->file('image')->hashName();
            $request->file('image')->storeAs('public/images/users/', $image);
            $input['image'] = $image;
        }
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->returnData("access_token", $success, 'User created successfully.');
    }


    // login social

    public function loginSocial(SocialRequest $request)
    {

        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }
            // dd($user);
            $userSocial = Social::where('social_id', $request->social_id)
                ->where('type_social', $request->type_social)
                ->first();
            if (!$userSocial) {
                $userSocial = Social::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'user_id' => $user->id,
                    'social_id' => $request->social_id,
                    'type_social' => $request->type_social,
                ]);
                // dd("s");
            }
            $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $userSocial['name'];
            $success['phone'] = $userSocial['phone'];
            return $this->returnData("access_token", $success, 'User Signed in');
        } catch (\Throwable $th) {
            return $this->returnError(400, ['Server Error' => $th->getMessage()]);
        }
    }


    // update social phone
    public function update_social_phone(Request $request)
    {
        $user = Auth::user();
        $social = Social::where('user_id', $user->id)->first();
        $req = Validator::make($request->all(), [
            'phone' => 'required|unique:socials,phone',
        ]);
        if ($req->fails()) {
            return $this->returnError(422, $req->errors());
        }
        $data = $request->get('phone');
        $social->update([
            'phone' => $data,
        ]);
        return $this->returnSuccessMessage("phone updated success", 200);
    }

    /// log out
    public function signout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return response()->json([
            'status' => 'true',
            'message' => 'User log out'

        ]);
    }


    // change password
    public function change_password(Request $request)
    {
        $input = $request->all();
        $userid = Auth::user()->id;
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }
        }
        return Response::json($arr);
    }
}
