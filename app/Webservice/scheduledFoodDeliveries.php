<?php
/**
 * Created by PhpStorm.
 * User: Catalin
 * Date: 30/11/2018
 * Time: 00:57
 */

namespace App\Webservice;


use Illuminate\Support\Facades\DB;

class scheduledFoodDeliveries
{
    public static function createSchedule($date,$name,$quantity,$supplier){
        $id = hash(MHASH_SHA256,$date.$name.$quantity.$supplier.strtotime("now"));
        DB::insert("INSERT INTO Schedules (id,date,name,quantity,supplier) VALUES ('$id','$date','$name','$quantity','$supplier')");
        return $id;
    }

    public static function deleteSchedule($id){
        DB::delete("DELETE FROM Schedules WHERE id = '$id'");
    }

    public static function editSchedule($schedule){
        DB::update("UPDATE Schedules SET date = '$schedule->date', name = '$schedule->name', quantity = '$schedule', supplier = '$schedule->supplier' WHERE id = '$schedule->id'");
    }

    public static function getSchedules(){
        return DB::select("SELECT * FROM Schedules");
    }
}