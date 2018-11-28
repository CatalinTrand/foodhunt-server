<?php
/**
 * Created by PhpStorm.
 * User: Catalin
 * Date: 28/11/2018
 * Time: 11:49
 */

namespace App\Webservice;


use Illuminate\Support\Facades\DB;

class orderHandler
{
    public static function createOrder($truckID, $offers,$address,$phone){
        //update current quantities
        $toSave = "";
        foreach ($offers as $offer){
            DB::update("UPDATE Offers SET quantity = quantity - ".$offer->quantity." WHERE id = ''".$offer->id."'");
            $toSave .= $offer->name . "#" . $offer->quantity . "#" . $address . "#" . $phone . "<###>";
        }
        //save new order
        $id = hash(MHASH_SHA256,$truckID.$toSave.$address.$phone.strtotime("now"));
        DB::insert("INSERT INTO Orders (id,truckID,cart,address,phone) VALUES ('$id','$truckID','$toSave','$address','$phone')");
        return $id;
    }

    public static function getOrders($truckID){
        return DB::select("SELECT * FROM Orders WHERE truckID = '$truckID'");
    }

    public static function deliverOrder($truckID,$time,$address){
        DB::update("UPDATE Orders SET delivered = TRUE WHERE truckID = '$truckID' AND creation_time = '$time' AND address = '$address'");
    }

    public static function archiveOrders(){
        $orders = DB::select("SELECT * FROM Orders");
        foreach ($orders as $order){
            $id = $order->id;
            $truckID = $order->truckID;
            $cart = $order->cart;
            $address = $order->address;
            $phone = $order->phone;
            $time = $order->creation_time;
            DB::insert("INSERT INTO Orders_arch (id,truckID,cart,address,phone,creation_time) VALUES ('$id','$truckID','$cart','$address','$phone','$time');");
        }
        DB::table('Orders')->truncate();
    }

    public static function getOrdersArchived(){
        return DB::select("SELECT * FROM Orders_arch");
    }
}