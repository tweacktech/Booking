<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\Flight;
use DB;
use Auth;


class APIResourceController extends Controller
{
    
    public function company(){

  $data =Company::all();

  return response()->json(['data'=>$data]);
    }

    public function showCompany($id){

        $data=Company::find($id);
         return response()->json(['data'=>$data]);
    }

     public function Flight(){

  $data =Flight::all();

  return response()->json(['data'=>$data]);
    }

    public function showFlight($id){
        $data=Flight::find($id);
         return response()->json(['data'=>$data]);
    }


}
