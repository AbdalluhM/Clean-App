<?php

namespace App\Http\Controllers\Api;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    use GeneralTrait;
    public function index(){
        $user=Auth::user();
        return $this->returnData('notification',$user->notification,"done");
    }
}
