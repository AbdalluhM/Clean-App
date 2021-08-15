<?php

namespace App\Http\Controllers\Api;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $user = Auth::user();
        return $this->returnData('notifications', NotificationResource::collection($user->notifications), "done");

        // foreach ( as $note) {
        //     var_dump($note->data['title']);
        // }
    }
    //     foreach($user->notifications as $not){
    //         $notf=  $not->date['title'];
    //         var_dump($notf);
    //         dd($notf);
    //     };
    //     if($user->notification){
    // }
    // return $this->returnError(400,"not notification yet");
    // }

    public function updateToken(Request $request)
    {
        try {
            $req = Validator::make($request->all(), [
                'token' => 'required',
            ]);
            if ($req->fails()) {
                return $this->returnError(422, $req->errors());
            }
            $user = Auth::user();
            $user->update(['fcm_token' => $request->token]);
            return $this->returnSuccessMessage("fcm_token created successfully", 200);
        } catch (\Exception $e) {
            report($e);
            return $this->returnError(500, $e->getMessage());
        }
    }
}
