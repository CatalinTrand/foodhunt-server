<?php
/**
 * Created by PhpStorm.
 * User: Catalin
 * Date: 30/11/2018
 * Time: 16:39
 */

namespace App\Webservice;


use Illuminate\Support\Facades\DB;

class userAuth
{
    public static function createUser($name,$address,$phone,$email,$type,$password){
        $id = hash(MHASH_SHA256,$name.$address.$phone.$email.$type.strtotime('now'));
        $pass = hash(MHASH_SHA256,$password);
        DB::insert("INSERT INTO Users (id,name,address,phone,email,type,password) VALUES ('$id','$name','$address','$phone','$email','$type','$pass')");
        return $id;
    }

    public static function editUser($user){
        DB::update("UPDATE Users SET name = '$user->name', address = '$user->address', phone = '$user->phone', email = '$user->email', type = '$user->type' WHERE id = '$user->id'");
    }

    public static function deleteUser($id){
        DB::delete("DELETE FROM Users WHERE id = '$id'");
    }

    public static function loginUser($credentials){
        $pass = hash(MHASH_SHA256,$credentials->password);
        $result = DB::select("SELECT * FROM Users WHERE email = '$credentials->email' AND password = '$pass'");
        if(count($result) > 0){
            $id = $result[0]->id;
            $key = hash(MHASH_SHA256,$pass.strtotime('now'));
            DB::insert("INSERT INTO AuthTable (id,key) VALUES ('$id','$key')");
            return $key;
        } else return null;
    }

    public static function logoutUser($id){
        DB::delete("DELETE FROM AuthTable WHERE id = '$id'");
    }
}