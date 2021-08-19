<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Recieve;
use App\Models\SupCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kutia\Larafirebase\Facades\Larafirebase;

class HomeController extends Controller
{
    const PER_PAGE = 4;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('updateToken');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $newService = SupCategory::orderBy('id','DESC')->paginate(4);
        $recieves=Recieve::all();
        $services=SupCategory::all();
        $customers=User::all();
        $newcustomers=User::where( 'created_at', '>', Carbon::now()->subDays(10))->get();
        return view('dashboard.dashboard')->with([
            'newServices'=>$newService,
            'recieves'=>$recieves,
            'services'=>$services,
            'customers'=>$customers,
            'newcustomers'=>$newcustomers,
        ]);
    }
    public function updateToken(Request $request){
        try{
            $input=$request->validate([
                'token'=>'required'
            ]);
            $user=Auth::user();
            $user->update(['fcm_token'=>$input]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }
    public function notification(Request $request){
        $request->validate([
            'title'=>'required',
            'message'=>'required'
        ]);

        try{
            $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

            //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));

            /* or */

            //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

            /* or */

            Larafirebase::withTitle($request->title)
                ->withBody($request->message)
                ->sendMessage($fcmTokens);

            return redirect()->back()->with('success','Notification Sent Successfully!!');

        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error','Something goes wrong while sending notification.');
        }
    }
}
