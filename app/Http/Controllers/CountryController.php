<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Http\Resources\CountryResource;
use Validator;

class CountryController extends Controller
{
    public function index(){
        $response = Countries::get();
     
        return response()->json([
            'countries'=>$response
        ]);
    }

    public function  store(Request $request){
        $validator = Validator::make($request->all(),[
         
            'name' => 'required|string|max:150',
            'code' => 'required|string|max:3',
            'continent'  => 'required|string|max:50',
    
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }


      $countries = Countries::create([
            'name'=>$request->name,
            'code' => $request->code,
            'continent' => $request->continent,
        ]);

        return response()
        ->json(['sukses.',
        'countries' => new CountryResource($countries),
        ]);

    }

}
