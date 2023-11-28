<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Validator;
use Auth;

use App\Models\Order;
use App\Models\Room;

class OrderController extends Controller
{

    function index(){
        return view('resepsionis.order.index');
    }

    function createIndex(Request $req){
        $decodeRoomId=base64_decode($req->input('room'));

        return view('tamu.transaction.index',[
            'data'=>Room::findOrFail($decodeRoomId)->load(['category'])
        ]);
    }

    function listIndex(){
        return view('tamu.order.index');
    }

    function store(Request $req){
        $validator=Validator::make($req->except(['id']),[
          "user_id"=>['required'],
          "room_id"=>['required'],
          "order_code"=>['required'],
          "total_room"=>['required'],
          "total_price"=>['required'],
          "check_in"=>['required'],
          'check_out'=>['required']
        ]);

        $data=[
            "user_id"=>$req->user_id,
            "room_id"=>$req->room_id,
            "order_code"=>$req->order_code,
            "total_room"=>$req->total_room,
            "total_price"=>$req->total_price,
            "check_in"=>$req->check_in,
            "check_out"=>$req->check_out
        ];

        if($req->ajax()){
            try{
                if($validator->passes()){
                    Order::create($data);
                    return response()->json(200);
                }
            }catch(\Throwable $th){
                abort(500, $validator->messages());
            }
        }
    }

    function softDeletes(Request $req){
        $currentData=Order::findOrFail($req->id);
 
        if($req->ajax()){
            try{
                $currentData->delete();
                return response()->json(200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function forceDeletes(Request $req){
        $currentData=Order::findOrFail($req->id);

        if($req->ajax()){
            try{
                $currentData->forceDelete();
                return response()->json(200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function getWithoutTrashed(Request $req){
        if($req->ajax()){
            try{
                $userOrder=Order::with(['room', 'room.category'])->latest()->where('user_id', Auth::user()->id)->get();
                return response()->json(['userOrder'=>$userOrder], 200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function getWithTrashed(Request $req){
        $query=Order::with(['user', 'room', 'room.category'])->latest()->withTrashed()->get();

        return Datatables($query)
                ->make();
    }

    function update(Request $req){
        $currentData=Order::findOrFail($req->id);

        $newData=[
            "is_paid"=>$req->is_paid
        ];

        if($req->ajax()){
            try{
                $currentData->update($newData);
                return response()->json(200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

}
