<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Validator;
use Str;

use App\Models\GeneralFacilities;

class GeneralController extends Controller
{
    function index(){
        return view('generalfacilities.index');
    }

    function createIndex(){
        return view('generalfacilities.create');
    }

    function editIndex(Request $req){
        $id=$req->input('generalfacilities');
        return view("generalfacilities.edit",[
           "currentData"=>GeneralFacilities::findOrFail($id)
        ]);
    }

    function data(){
        $query=GeneralFacilities::all();
        return Datatables($query)
               ->addIndexColumn()
               ->make();
    }

    function store(Request $req){
        $validator=Validator::make($req->all(),[
            "image"=>['required'],
            "title"=>['required', 'unique:general_facilities'],
            "description"=>['required', 'min:80']
        ]);

        $image=$req->image;
        $imageName = Str::random(10) . '.' . 'png';

        $data=[
            "image"=>'/assets/images/' . $imageName,
            "title"=>$req->title,
            "description"=>$req->description
        ];

        if($req->ajax()){
            try{ 
                if($validator->passes()){
                \File::put(public_path(). '/assets/images/' . $imageName, base64_decode($image));
                }
                GeneralFacilities::create($data);
                return response()->json(200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function delete(Request $req){
        $currentData=GeneralFacilities::findOrFail($req->id);
 
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

    function get(Request $req){
        if($req->ajax()){
            try{
                return response()->json(["facilities"=>GeneralFacilities::all()], 200);
            }catch(\Throwable $th){
                abort(500, $th->getMessage());
            }
        }
    }

    function update(Request $req){
        $currentData=GeneralFacilities::findOrFail($req->id);
        $validator=Validator::make($req->all(),[
            "title"=>['required'],
            "description"=>['required'],
        ]);

        if($req->title !== $currentData->title){
            $validator=Validator::make($req->all(),[
                "title"=>['required', 'unique:general_facilities']
            ]);
        }

        $data=[
            "title"=>$req->title,
            "description"=>$req->description,
        ];

        try{ 
            $currentData->update($data);
            return response()->json(200);
        }catch(\Throwable $th){
            abort(500, $validator->messages());
        }
    }
}
