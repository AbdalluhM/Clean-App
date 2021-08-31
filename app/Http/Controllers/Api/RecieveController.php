<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Recieve;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\RecieveDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RecieveRequest;
use App\Http\Resources\RecieveResource;
use App\Notifications\DbStoreNotification;
use App\Notifications\SendPushNotification;
use Illuminate\Support\Facades\Notification;

class RecieveController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $user = Auth::user();
        $recieves = Recieve::where('user_id', $user->id)->get();
        // dd($recieveDetail);
        return $this->returnData('recieves',RecieveResource::collection($recieves), "done");
    }
    public function store(RecieveRequest $request)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        if ($carts->count() > 0) {
            $recieve = Recieve::create([
                'user_id' => $user->id,
                // 'employee_id' => $request->employee_id,
                'address' => $request->address,
                'time_start' => $request->time_start,
                'desc' => $request->desc,
            ]);
            foreach ($carts as $cart) {
                RecieveDetails::create([
                    'recieve_id' => $recieve->id,
                    'sup_category_id' => $cart->sup_category_id,
                    'num_workers' => $cart->num_workers,
                ]);
            }
            DB::table('carts')->delete();
            $title="recieved is complete";
            $message="our employee will arrive in 50 min";
            $fcmTokens=auth()->user()->fcm_token;
            Notification::send( $user,new SendPushNotification($title,$message,$fcmTokens));
            $this->send($fcmTokens,$title,$message);
            return $this->returnSuccessMessage('recieve create successfully', 200);


            // auth()->user()->notify(new DbStoreNotification($title,$message));
        }
        return $this->returnError(400, "cart must be full");
    }
}
