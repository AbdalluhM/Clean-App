<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public  function index()
    {
        $permissions = Permission::paginate(4);
        $i=1;
        return view('dashboard.permission.index')->with('permissions',$permissions)->with('i',$i);
    }
}
