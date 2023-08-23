<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{

    public function index(){
        return view('pages.country');
    }

    public function ajax_index(){

        $data= Countries::orderBy('name', 'asc');
        return DataTables::of($data)->addIndexColumn()->make(true);

        // return view('pages.country');
    }
    



}
