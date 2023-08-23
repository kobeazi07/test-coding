<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\States;
use App\Models\Countries;
use Yajra\DataTables\Facades\DataTables;

class StateController extends Controller
{
    public function index(){
        // $response = Http::get('http://127.0.0.1:8000/api/country'); 
        // $cid = $response->json();
        // dd($cid);
        $cid = Countries::get();
        return view('pages.states',compact('cid'));
    }
    public function ajax_index(){

        $data= States::orderBy('name', 'asc');
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('country_id', function($data){
            return $data->r_countries->name ?? '-';
        })
        ->make(true);
    }

}
