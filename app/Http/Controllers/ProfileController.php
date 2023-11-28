<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Order;

class ProfileController extends Controller
{
    function index(Request $req){
        $orderEachUser=Order::where('user_id', Auth::user()->id)->get();
        
        return view('profile.index',[
            "orderEachUser"=>$orderEachUser
        ]);
    }
}
