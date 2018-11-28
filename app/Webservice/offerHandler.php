<?php
/**
 * Created by PhpStorm.
 * User: Catalin
 * Date: 28/11/2018
 * Time: 11:23
 */

namespace App\Webservice;


use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class offerHandler
{
    public static function createOffer($truckID,$name,$price,$quantity){
        //insert offer
        $id = hash(MHASH_SHA256,$truckID.$name.$price.$quantity.strtotime("now"));
        if($quantity == null)
            $quantity = 0;
        DB::insert("INSERT INTO Offers (truckID,id,name,price,quantity,available) VALUES ('$truckID','$id','$name','$price','$quantity')");
    }

    static function distanceBetween($lat,$lng,$truck){
        //get distance using lat-lng
        $tLat = $truck->lat;
        $tLng = $truck->lng;

        $lonDelta = $lng - $tLng;
        $a = pow(cos($lat) * sin($lonDelta), 2) +
            pow(cos($tLat) * sin($lat) - sin($tLat) * cos($lat) * cos($lonDelta), 2);
        $b = sin($tLat) * sin($lat) + cos($tLat) * cos($lat) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        return $angle * 6371000;
    }

    public static function getOffers($lat,$lng,$radius){ //radius in meters
        //get all offers for a user in range
        $allOffers = [];
        $trucks = DB::select("SELECT * FROM Trucks");
        $nearTrucks = [];
        foreach ($trucks as $truck){
            if(self::distanceBetween($lat,$lng,$truck) < $radius)
                array_push($nearTrucks,$truck);
        }
        foreach ($nearTrucks as $nearTruck){
            $truckOffers = DB::select("SELECT * FROM Offers WHERE truckID = ".$nearTruck->id);
            $allOffers = array_merge($allOffers,$truckOffers);
        }
        return $allOffers;
    }

    public static function flushOffers($truckID){
        //delete all remaining offers for a truck
        DB::delete("DELETE FROM Offers WHERE truckID = '$truckID'");
    }
}