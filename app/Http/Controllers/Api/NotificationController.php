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
    public function send($device_token,$title,$message)
    {
        return $this->sendNotification($device_token, array(
          "title" => $title,
          "body" => $message,
        ));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification($device_token, $message)
    {
        $SERVER_API_KEY = '<YOUR-SERVER-API-KEY>';

        // payload data, it will vary according to requirement
        $data = [
            "to" => $device_token, // for single device id
            "data" => $message
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }


    // public function updateToken(Request $request)
    // {
    //     try {
    //         $req = Validator::make($request->all(), [
    //             'token' => 'required',
    //         ]);
    //         if ($req->fails()) {
    //             return $this->returnError(422, $req->errors());
    //         }
    //         $user = Auth::user();
    //         $user->update(['fcm_token' => $request->token]);
    //         return $this->returnSuccessMessage("fcm_token created successfully", 200);
    //     } catch (\Exception $e) {
    //         report($e);
    //         return $this->returnError(500, $e->getMessage());
    //     }
    // }
}
