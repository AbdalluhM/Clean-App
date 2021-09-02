<?php

namespace App\Http\Controllers\Wep;

use App\Models\Admin;
use App\Models\Recieve;
use Illuminate\Http\Request;
use App\Models\RecieveDetails;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class RecieveController extends Controller
{
    public function index(){
        $recieves=Recieve::paginate(5);
        return view('dashboard.recieves.index')->with('recieves',$recieves);
    }

    public function details($id){
      $recieveDetails=RecieveDetails::where('recieve_id',$id)->paginate(5);
      return view('dashboard.recieves.details')->with('recieveDetails',$recieveDetails);
    }

    public function add_emp($id){
        $recieve=Recieve::find($id);
        $users=Admin::whereNull('is_admin')->get();
        // dd($users);
        return view('dashboard.recieves.addEmployee',compact('users','recieve'));
    }

    public function store_emp(Request $request, $id){
        $recieve=Recieve::find($id);
        // dd($recieve);
        $recieve->update([
            'employee_id'=>$request->employee_id,
            'status'=>$request->status,
        ]);
        $user=Admin::where('id',$request->employee_id)->first();
        $user->worked+=1;
        $user->save();
        Toastr::success('Employee Updated successfully :)','Success');
        return view('dashboard.recieves.index');
    }
}
