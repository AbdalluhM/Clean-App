<?php

namespace App\Http\Controllers\Wep;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\Order;
use App\Models\Recieve;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index', 'store', 'sub_customer']]);
    //     $this->middleware('permission:customer-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:customer-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $users = User::paginate(4);
        return view('dashboard.cusstomers.index')->with('users', $users);
    }

    public function customer_details($id)
    {
        $customer = User::find($id);
        //   $address=address::where('user_id',$customer->id)->first();
        $recieves = Recieve::where('user_id', $customer->id)->paginate(5);
        return view('dashboard.cusstomers.details')->with('customer', $customer)->with('recieves', $recieves);
    }
}
