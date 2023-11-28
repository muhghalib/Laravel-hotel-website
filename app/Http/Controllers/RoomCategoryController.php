<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

use App\Models\RoomCategory;

class RoomCategoryController extends Controller
{
    function index(){
        return view('room.category.index');
    }

    function data(){
        $query=RoomCategory::all()->load(['room']) ?? [];
        return DataTables($query)
               ->addIndexColumn()
               ->make();
    }

    function get(Request $req){
        $roomCategoryData=RoomCategory::all();

        if($req->ajax()){
            try{
                return response()->json(["room_category"=>$roomCategoryData], 200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function delete(Request $req){
        $currentData=RoomCategory::findOrFail($req->id);
 
        if($req->ajax()){
         try{
             $currentData->delete();
             return response()->json(200);
         }catch(\Throwable $th){
             abort(500, $th->getMessage());
         }
        }
    }

    function store(Request $req){
        $validator=Validator::make($req->all(),[
            "name"=>["required","unique:room_category"]
        ]);

        $data=[
            "name"=>$req->name
        ];
        
        if($req->ajax()){
            try{
                RoomCategory::create($data);
                return response()->json(200);
            }catch(\Throwable $th){
                abort(500, $validator->messages());
            }
        }
    }

    function update(Request $req){
        $currentData=RoomCategory::findOrFail($req->id);
        $validator=Validator::make($req->all(),[
            "name"=>["required"]
        ]);

        if($currentData->name !== $req->name){
            $validator=Validator::make($req->all(),[
                "name"=>["required", "unique:room_category"]
            ]);
        }

        $data=[
            "name"=>$req->name
        ];
        
        if($req->ajax()){
            try{
                $currentData->update($data);
                return response()->json(200);
            }catch(\Throwable $th){
                abort(500, $validator->messages());
            }
        }
    }
}
