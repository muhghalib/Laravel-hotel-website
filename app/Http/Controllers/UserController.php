<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view('user.index');
    }

    function data(){
        $query=User::withTrashed();
       
        return Datatables($query)->make();
    }

    function delete(Request $req){
       $currentData=User::findOrFail($req->id);

       if($req->ajax()){
        try{
            $currentData->delete();
            return response()->json(200);
        }catch(\Throwable $th){
            abort(500, $th->getMessage());
        }
       }
    }

    function restore(Request $req){
        $currentData=User::withTrashed()->where('id', $req->id);
 
        if($req->ajax()){
         try{
             $currentData->restore();
             return response()->json(200);
         }catch(\Throwable $th){
             abort(500, $th->getMessage());
         }
        }
    }

    function get(Request $req){
        $userData=User::withTrashed()->get();

        if($req->ajax()){
            try{
                return response()->json(["user"=>$userData], 200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function update(Request $req){
        $currentData=User::findOrFail($req->id);

        $newData=[
            "role"=>$req->role,
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
