<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function index(){
        $names = Name::all();
        return view('ajax', ['names' => $names]);
    }
    public function getData(){
        $data = Name::all();
        return response()->json([
            'data' => $data
        ]);
    }
    public function saveName(Request $req){
        //simple way
        // $data = $req->validate([
        //     'name' => 'required',
        // ]);
         // $name = Name::create($data);
        // return response()->json($name);

        // official way
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                // 'errors' => $validator->messages(),
                'message' => 'Fill the Form correctly...!'
            ]);
        }
        else{
            $data = new Name();
            $data->name = $req->input('name');
            $data->address = $req->input('address');
            $data->save();
            return response()->json([
                'data' => $data,
                'status' => 200,
                'message' => 'Saved Successfully...!'
            ]);
        }
    }

    public function getRecord($id){
        $record = Name::find($id);
        if($record){
            return response()->json([
                'status' => 200,
                'record' => $record,
            ]);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'Record Not Found'
            ]);
        }
    }
    public function updateRecord(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'address' => 'required'
        ]);


        if($validator->fails()){
            return response()->json([
                'status' => 400,
                // 'errors' => $validator->messages(),
                'message' => 'Fill the Form correctly...!',
            ]);
        }
        else{
            $record = Name::find($id);
            if($record){

                $record->name = $req->input('name');
                $record->address = $req->input('address');
                $record->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Updated Successfully..!'
                ]);
            }
            else{
                return response()->json([
                    'status', 400,
                    'message', 'Record Not Found...!'
                ]);
            }
        }
    }
    public function deleteRecord($id){
        $record = Name::find($id);
        if($record){
            $record->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Record Deleted..!'
            ]);
        }
    }
}
