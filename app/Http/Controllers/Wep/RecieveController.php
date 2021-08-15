<?php

namespace App\Http\Controllers\Wep;

use App\Http\Controllers\Controller;
use App\Models\Recieve;
use App\Models\RecieveDetails;
use Illuminate\Http\Request;

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
}
