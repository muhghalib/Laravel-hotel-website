<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Storage;
use Auth;
use DB;

use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Order;

class RoomController extends Controller
{
    function index(){
        if(Auth::user()->role==="tamu"){
            return view('tamu.room.index',[
                    "room_category"=>RoomCategory::all()
            ]);
        }else{
            return view('room.index');
        }
    }

    function createIndex(){
        return view('room.create',[
            'room_category'=>RoomCategory::all()
        ]);
    }

    function detailIndex(Request $req){
        $roomIdDecode=base64_decode($req->input('room'));
        if(Auth::user()->role==="tamu"){
            return view('tamu.room.detail',[
                "room"=>Room::findOrFail($roomIdDecode)->load(['category'])
            ]);
        }else{
            return view('room.detail',[
                "data"=>Room::findOrFail($roomIdDecode)->load(['category'])
            ]);
        }
    }

    function editIndex($id){
        return view('room.edit',[
            "currentData"=>Room::findOrFail($id)->load(['category']),
            "room_category"=>RoomCategory::all(),
        ]);
    }

    function get(Request $req){
        $roomData=Room::all()->load(['category']);

        if($req->ajax()){
            try{
                return response()->json(["room"=>$roomData], 200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function store(Request $req){
        $validator=Validator::make($req->all(),[
            "image"=>['required'],
            "room_category_id"=>['required'],
            "price"=>['required'],
            "description"=>['required'],
            "max_guest"=>['required'],
            "available_room"=>['required'],
            "total_bed_room"=>['required'],
            "total_bath_room"=>['required']
        ],
        [
            "room_category_id.required"=>"The room category field is required"    
        ]
        );
        $image=$req->image;
        $imageName = Str::random(10) . '.' . 'png';

        $data=[
            "image"=>'/assets/images/' . $imageName,
            "room_category_id"=>$req->room_category_id,
            "price"=>$req->price,
            "description"=>$req->description,
            "max_guest"=>$req->max_guest,
            "available_room"=>$req->available_room,
            "total_bed_room"=>$req->total_bed_room,
            "total_bath_room"=>$req->total_bath_room,
            "king_bed"=>$req->king_bed ?? 0,
            "twin_bed"=>$req->twin_bed ?? 0,
            "ac"=>$req->ac ?? 0,
            "bathtub"=>$req->bathtub ?? 0,
            "refrigator"=>$req->refrigator ?? 0,
            "wifi"=>$req->wifi ?? 0,
            "minibar"=>$req->minibar ?? 0,
            "kitchen"=>$req->kitchen ?? 0,
            "television"=>$req->television ?? 0,
            "include_breakfast"=>$req->include_breakfast ?? 0
        ];

        try{ 
            if($validator->passes()){
               \File::put(public_path(). '/assets/images/' . $imageName, base64_decode($image));
            }
            Room::create($data);
            return response()->json(200);
        }catch(\Throwable $th){
            abort(500, $validator->messages());
        }
    }

    function delete(Request $req){
        $currentData=Room::findOrFail($req->id);
 
        if($req->ajax()){
         try{
             \File::delete(public_path(). $currentData->image);
             $currentData->delete();
             return response()->json(200);
         }catch(\Throwable $th){
             abort(500, $th->getMessage());
         }
        }
    }

    function update(Request $req){
        $currentData=Room::findOrFail($req->id);
        $validator=Validator::make($req->all(),[
            "room_category_id"=>['required'],
            "price"=>['required'],
            "description"=>['required'],
            "max_guest"=>['required'],
            "available_room"=>['required'],
            "total_bed_room"=>['required'],
            "total_bath_room"=>['required']
        ],
        [
            "room_category_id.required"=>"The room category field is required"    
        ]
        );

        $data=[
            "room_category_id"=>$req->room_category_id,
            "price"=>$req->price,
            "description"=>$req->description,
            "max_guest"=>$req->max_guest,
            "available_room"=>$req->available_room,
            "total_bed_room"=>$req->total_bed_room,
            "total_bath_room"=>$req->total_bath_room,
            "king_bed"=>$req->king_bed ?? 0,
            "twin_bed"=>$req->twin_bed ?? 0,
            "ac"=>$req->ac ?? 0,
            "bathtub"=>$req->bathtub ?? 0,
            "refrigator"=>$req->refrigator ?? 0,
            "wifi"=>$req->wifi ?? 0,
            "minibar"=>$req->minibar ?? 0,
            "kitchen"=>$req->kitchen ?? 0,
            "television"=>$req->television ?? 0,
            "include_breakfast"=>$req->include_breakfast ?? 0
        ];

        try{ 
            $currentData->update($data);
            return response()->json(200);
        }catch(\Throwable $th){
            abort(500, $validator->messages());
        }
    }

    public function checkRoom(Request $req){
        if($req->ajax()){
            try{
                $order=Order::select('room_id', DB::raw('sum(total_room) as total_ordered_room'))
                        ->where('check_in', $req->check_in)
                        ->where('check_out', $req->check_out)
                        ->whereNull('deleted_at')
                        ->groupBy('room_id');

                $roomAvailable = Room::joinSub($order, 'order', function ($join) {
                                $join
                                ->on('room.id', 'order.room_id')->
                                groupBy('id');
                                })
                                ->select('id', 'total_ordered_room')
                                ->get()
                                ->load(['category']);

                return response()->json(['room'=>$roomAvailable], 200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        
        }
    }

}
