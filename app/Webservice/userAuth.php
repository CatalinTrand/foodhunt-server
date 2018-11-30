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
    public function createUser($name,$address,$phone,$email,$type,$password){
        $id = hash(MHASH_SHA256,$name.$address.$phone.$email.$type.strtotime('now'));
        $pass = hash(MHASH_SHA256,$password);
        DB::insert("INSERT INTO Users (id,name,address,phone,email,type,password) VALUES ('$id','$name','$address','$phone','$email','$type','$pass')");
        return $id;
    }

    public function editUser($user){
        DB::update("UPDATE Users SET name = '$user->name', address = '$user->address', phone = '$user->phone', email = '$user->email', type = '$user->type' WHERE id = '$user->id'");
    }

    public function deleteUser($id){
        DB::delete("DELETE FROM Users WHERE id = '$id'");
    }

    public function loginUser($credentials){
        
    }

    public function logoutUser($id){

    }
}