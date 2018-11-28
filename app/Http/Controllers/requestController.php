<?php

namespace App\Http\Controllers;

use App\Webservice\truckHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class requestController extends Controller
{
    //offers


    //orders


    //trucks
    public function updateTruckPosition(){
        truckHandler::updateTruckPosition(
            Input::get("truckID"),
            Input::get("lat"),
            Input::get("lng")
        );
    }
}
