<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\States;
use App\Http\Resources\StateResource;
use Validator;

class StateController extends Controller
{
    public function index(){
        $state = States::get();
        return response()->json([
            'states'=>$state
        ]);
    }

    public function  store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
            'country_id' => 'required|integer|max:11',
            'code' => 'required|string|max:3',
            'kepulauan_code'  => 'required|string|max:50',
            'bagian'  => 'required|string|max:50',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
      $state = States::create([
            'name'=>$request->name,
            'country_id'=>$request->country_id,
            'code' => $request->code,
            'kepulauan_code' => $request->kepulauan_code,
            'bagian' => $request->bagian,
        ]);

        return response()
        ->json(['sukses.',
        'states' => new StateResource($state),

        ]);
    }



}
