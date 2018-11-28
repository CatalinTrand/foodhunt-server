<?php
/**
 * Created by PhpStorm.
 * User: Catalin
 * Date: 28/11/2018
 * Time: 11:50
 */

namespace App\Webservice;


class truckHandler
{
    public static function updateTruckPosition($truckID,$lat,$lng){
        DB::update("UPDATE Trucks SET lat = '$lat', lng = '$lng',last_updated = NOW() WHERE id = '$truckID'");
    }
}